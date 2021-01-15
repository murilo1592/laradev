<?php

namespace LaraDev\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = DB::select('select * from properties');

        return view('property/index')->with('properties', $properties);
    }

    public function show($name)
    {
        $property = DB::select("select * from properties where name = ?", [$name]);

        if (empty($property)) {

            return redirect()->action("PropertyController@index");
        }

        return view('property/show')->with('property', $property);
    }

    public function create()
    {
        return view('property/create');
    }

    public function store(Request $request)
    {
        $property = [
            $request->title,
            $request->description,
            $request->rental_price,
            $request->sale_price,
            $this->setName($request->title)
        ];

        DB::insert("INSERT INTO properties (title, description, rental_price, sale_price, name) VALUES
                            (?, ?, ?, ?, ?)", $property);

        return redirect()->action('PropertyController@index');
    }

    public function edit($name)
    {
        $property = DB::select("select * from properties where name = ?", [$name]);

        if (empty($property)) {

            return redirect()->action("PropertyController@index");
        }

        return view('property/edit')->with('property', current($property));
    }

    public function update(Request $request, $id)
    {
        $property = [
            $request->title,
            $request->description,
            $request->rental_price,
            $request->sale_price,
            $this->setName($request->title),
            $id
        ];

        DB::update("update properties
                            set
                                title = ?,
                                description = ?,
                                rental_price = ?,
                                sale_price = ?,
                                name = ?
                            where id = ?", $property);

        return redirect()->action('PropertyController@index');
    }

    public function destroy($id)
    {
        $property = DB::select("select * from properties where id = ?", [$id]);

        if (empty($property)) {

            return redirect()->action("PropertyController@index");
        }

        DB::delete("delete from properties where id = ?", [$id]);

        return redirect()->action("PropertyController@index");
    }

    private function setName($name)
    {
        $properties = $properties = DB::select('select * from properties');

        $cont = 0;

        $propertySlug = str_slug($name);

        foreach ($properties as $info) {

            if (str_slug($info->title === $propertySlug)) {

                $cont++;
            }
        }

        if ($cont > 0) {

            $propertySlug = $propertySlug . '-' . $cont;
        }

        return $propertySlug;
    }
}
