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

    $heightInMeters = $request->height / 100;
    $bmi = $request->weight / ($heightInMeters * $heightInMeters);

    bmi::create([
        'user_id' => $request->user_id,
        'weight' => $request->weight,
        'height' => $request->height,
        'bmi' => $bmi,
    ]);

    return redirect()->route('bmi.index')->with('success', 'BMI entry added successfully.');
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
    // Validate the input data
    $request->validate([
        'weight' => 'required|numeric',
        'height' => 'required|numeric',
    ]);

    // Find the existing BMI record to get the user_id
    $existingBmi = Bmi::findOrFail($id);

    $newBmi = new Bmi();
    $newBmi->user_id = $existingBmi->user_id; // Keep the original user_id
    $newBmi->weight = $request->weight;
    $newBmi->height = $request->height;
    $newBmi->bmi = $this->calculateBmi($request->weight, $request->height);
    $newBmi->save();

    return redirect()->route('bmi.index')->with('success', 'New BMI entry created successfully.');
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
