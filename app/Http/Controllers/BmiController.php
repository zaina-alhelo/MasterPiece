    <?php

        namespace App\Http\Controllers;

        use App\Models\bmi;
        use App\Models\User;
        use Illuminate\Http\Request;

        class BmiController extends Controller
        {
        

        public function index()
        {
        $users = User::with(['bmiCalculations' => function($query) {
                $query->latest(); 
            }])->get();

            return view('dashboard.bmi.index', compact('users'));

        }
            

    public function create(Request $request)
    {
        $user = User::find($request->input('user_id'));
        
        return view('dashboard.bmi.create', compact('user'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::find($request->user_id);

        $heightInMeters = $request->height / 100;
        $bmi = $request->weight / ($heightInMeters * $heightInMeters);

        $bmiEntry = Bmi::create([
            'user_id' => $request->user_id,
            'weight' => $request->weight,
            'height' => $request->height,
            'bmi' => $bmi,
            'gender' => $user->gender,
            'bmi_change_percentage' => null, 
            'age_group' => $this->determineAgeGroup($user->birth_date),
        ]);

        if ($bmiEntry) {
            return redirect()->route('bmi.index')->with('success', 'BMI entry added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to save BMI entry.');
        }
    }







    public function show($id)
    {
        $bmi = Bmi::findOrFail($id); 
        $user = User::findOrFail($bmi->user_id); 
        $bmiHistory = Bmi::where('user_id', $user->id)->get(); 

        return view('dashboard.bmi.show', compact('bmi', 'user', 'bmiHistory'));
    }


        public function edit($id)
        {
            $bmi = Bmi::findOrFail($id);
            $users = User::all();
            return view('dashboard.bmi.edit', compact('bmi', 'users'));
        }




    public function update(Request $request, $id)
    {
        $request->validate([
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
        ]);

        $existingBmi = Bmi::findOrFail($id);

        $heightInMeters = $request->height / 100;
        $newBmiValue = $request->weight / ($heightInMeters * $heightInMeters);

        $lastBmi = Bmi::where('user_id', $existingBmi->user_id)
                    ->where('id', '!=', $existingBmi->id)
                    ->latest()->first();

        $bmiChangePercentage = null;
        if ($lastBmi) {
            $bmiChangePercentage = (($newBmiValue - $lastBmi->bmi) / $lastBmi->bmi) * 100;
        }
        $existingBmi->update([
            'weight' => $request->weight,
            'height' => $request->height,
            'bmi' => $newBmiValue,
            'bmi_change_percentage' => $bmiChangePercentage,
        ]);
        

        return redirect()->route('bmi.index')->with('success', 'BMI updated successfully.');
    }


        private function determineAgeGroup($birthDate)
    {
        $age = \Carbon\Carbon::parse($birthDate)->age;

        return match (true) {
            $age >= 18 && $age <= 24 => '18-24',
            $age >= 25 && $age <= 34 => '25-34',
            $age >= 35 && $age <= 44 => '35-44',
            $age >= 45 && $age <= 54 => '45-54',
            $age >= 55 && $age <= 64 => '55-64',
            default => '65+',
        };
    }

            public function calculateBmi($weight, $height)
        {
            $heightInMeters = $height / 100;

            return round($weight / ($heightInMeters * $heightInMeters), 2);
        }

        
            public function destroy(bmi $bmi)
            {
                //
            }
        }
