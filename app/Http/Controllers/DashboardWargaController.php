<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Warga;
use Illuminate\Http\Request;

class DashboardWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->query('sort');
        $columns = ['nama', 'nik', 'jk', 'created_at', 'updated_at'];

        if (!in_array($sort, $columns)) {
            $sort = 'nama'; // Default sort by title if no valid sort parameter is provided
        }

        $order = $request->query('order','asc');
        $icon = $order === 'asc' ? 'bi bi-sort-alpha-down' : 'bi bi-sort-alpha-up';
        $posts = Warga::orderBy($sort, $order);

        $this->authorize('admin');
        return view('dashboard.warga.index',[
            'posts' => $posts->filter(request(['search']))->paginate(10)->withQueryString(),
            'sort' => $sort,
            'order' => $order,
            'icon' => $icon,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('admin');
        return view('dashboard.warga.create',[
            'datas' => Warga::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->authorize('admin');
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nik' => 'required|numeric|unique:App\Models\Warga,nik|digits:16',
            'jk' => 'required',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'jenis_pekerjaan' => 'required|max:255'

        ]);

        $validatedData['otoken'] = fake()->unique()->bothify('?????-#####');

        Warga::create($validatedData);

        return redirect('/dashboard/database-warga')->with('success','New data warga has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Warga $database_warga)
    {
        //
        $this->authorize('admin');
        return view('dashboard.warga.show',[
            'post' => $database_warga
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warga $database_warga)
    {
        $this->authorize('admin');
        return view('dashboard.warga.edit',[
            'post' => $database_warga,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warga $database_warga)
    {
        //
        $this->authorize('admin');
        $rules = [
            'nama' => 'required|max:255',
            'jk' => 'required',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'jenis_pekerjaan' => 'required|max:255'
        ];

        if($request->nik != $database_warga->nik){
            $rules['nik'] = 'required|numeric|unique:App\Models\Warga,nik|digits:16';
        }

        $validatedData = $request->validate($rules);

        Warga::where('id', $database_warga->id)->update($validatedData);

        return redirect('/dashboard/database-warga')->with('success','Data warga has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warga $database_warga)
    {
        //
        $this->authorize('admin');
        Warga::destroy($database_warga->id);
        return redirect('/dashboard/database-warga')->with('success','Data warga has been deleted!');
    }
}
