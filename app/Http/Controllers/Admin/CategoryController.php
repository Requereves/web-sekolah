
return view('admin.category.create');

}



/**

 * Store a newly created resource in storage.

 *

 * @param  \Illuminate\Http\Request  $request

 * @return \Illuminate\Http\Response

 */

public function store(Request $request)

{

    $this->validate($request, [

        'name' => 'required|unique:categories'

    ]);



    $category = Category::create([

        'name' => $request->input('name'),

        'slug' => Str::slug($request->input('name'), '-') 

    ]);



    if($category){

        //redirect dengan pesan sukses

        return redirect()->route('admin.category.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }else{

        //redirect dengan pesan error

        return redirect()->route('admin.category.index')->with(['error' => 'Data Gagal Disimpan!']);

    }

}



/**

 * Show the form for editing the specified resource.

 *

 * @param  int  $id

 * @return \Illuminate\Http\Response

 */

public function edit(Category $category)

{

    return view('admin.category.edit', compact('category'));

}



/**

 * Update the specified resource in storage.

 *

 * @param  \Illuminate\Http\Request  $request

 * @param  int  $id

 * @return \Illuminate\Http\Response

 */

public function update(Request $request, Category $category)

{

    $this->validate($request, [

        'name' => 'required|unique:categories,name,'.$category->id

    ]);



    $category = Category::findOrFail($category->id);

    $category->update([

        'name' => $request->input('name'),

        'slug' => Str::slug($request->input('name'), '-') 

    ]);



    if($category){

        //redirect dengan pesan sukses

        return redirect()->route('admin.category.index')->with(['success' => 'Data Berhasil Diupdate!']);

    }else{

        //redirect dengan pesan error

        return redirect()->route('admin.category.index')->with(['error' => 'Data Gagal Diupdate!']);

    }

}



/**

 * Remove the specified resource from storage.

 *

 * @param  int  $id

 * @return \Illuminate\Http\Response

 */

public function destroy($id)

{

    $category = Category::findOrFail($id);

    $category->delete();



    if($category){

        return response()->json([

            'status' => 'success'

        ]);

    }else{

        return response()->json([

            'status' => 'error'

        ]);

    }

}

}