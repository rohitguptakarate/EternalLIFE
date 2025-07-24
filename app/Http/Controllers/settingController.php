<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Company;
use App\Models\State;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class settingController extends Controller
{
    // Start Brand Route 
    public function showBrand()
    {
        // take Data form the DB 
        $Allbrand = Brand::all();
        return view('settingpages/brand', ["allBrandData" => $Allbrand]);
    }

    // Add Brand 
    public function addBrand(Request $request)
    {
        $validated = $request->validate([
            'Brand_Name' => 'required|string|max:100',
        ], [
            'Brand_Name.required' => 'Enter Brand Name!',
        ]);

        // Manually check if brand already exists
        $existing = Brand::where('Brand_Name', $validated['Brand_Name'])->first();
        if ($existing) {
            // Redirect without withInput() to clear the input box
            return redirect()->back()->with('error', 'This brand already exists!')->withInput(); // keeps the input only on success;
        }
        Brand::create($validated);
        return redirect()->back()->with('success', 'Brand added successfully!');
    }

    //Brand Edit Page 
    public function EditBrandPage($encryptedId)
    {
        // here we pass the decrypt Id 
        $id = decrypt($encryptedId);
        $Allbrand = Brand::findOrFail($id);
        return view('edit/brandEdit', ['Allbrand' => $Allbrand]);
    }
    // //Brand Update Page 
    public function updateBrand(Request $request, $id)
    {
        // Validate input
        $validated = $request->validate([
            'Brand_Name' => 'required|string|max:100',
        ], [
            'Brand_Name.required' => 'Enter Brand Name!',
        ]);

        // Get the existing brand to update
        $brand = Brand::findOrFail($id);

        // Check if the submitted name is same as current
        if ($brand->Brand_Name === $validated['Brand_Name']) {
            // No change made, redirect to brand list
            return redirect()->route('show.brand.page')->with('info', 'No changes were made.');
        }

        // Check if another brand with the same name already exists
        $existing = Brand::where('Brand_Name', $validated['Brand_Name'])
            ->where('id', '!=', $id)
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'This brand already exists!')->withInput();
        }

        // Update the brand
        $brand->Brand_Name = $validated['Brand_Name'];
        $brand->save();

        return redirect()->route('show.brand.page')->with('success', 'Brand updated successfully!');
    }



    // Category Route
    public function showCategory()
    {
        $AllCategory = Category::all();
        return view('settingpages/category', ['AllCategoryData' => $AllCategory]);
    }

    // Add Category 
    public function addCategory(Request $request)
    {
        $validated = $request->validate([
            'Category_Name' => 'required|string|max:100',
        ], [
            'Category_Name.required' => 'Enter Category Name!',

        ]);
        // Manually check if brand already exists
        $existing = Category::where('Category_Name', $validated['Category_Name'])->first();

        if ($existing) {
            // Redirect without withInput() to clear the input box
            return redirect()->back()->with('error', 'This Category Name already exists!')->withInput(); // <-- this will repopulate old() values;;
        }
        Category::create($validated);
        return redirect()->back()->with('success', 'Category added successfully!');
    }

    // Category Edit page 
    public function EditCategoryPage($Id)
    {
        $id = decrypt($Id);
        $AllCategory = Category::findOrFail($id);
        return view('edit/categoryEdit', ['AllCategory' => $AllCategory]);
    }
    // Category Update 
    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        // Validate input (without unique check for now)
        $validated = $request->validate([
            'Category_Name' => 'required|string|max:100',
        ], [
            'Category_Name.required' => 'Enter Category Name!',
        ]);

        // Case 1: No change in name
        if ($category->Category_Name === $validated['Category_Name']) {
            return redirect()->route('show.category.page')->with('info', 'No changes were made.');
        }

        // Case 2: Check if name exists for a different category
        $exists = Category::where('Category_Name', $validated['Category_Name'])
            ->where('id', '!=', $id)
            ->first();

        if ($exists) {
            return redirect()->back()->with('error', 'This category already exists!')->withInput();
        }

        // Case 3: Update with new unique name
        $category->Category_Name = $validated['Category_Name'];
        $category->save();
        return redirect()->route('show.category.page')->with('success', 'Category updated successfully!');
    }



    // Sub Category 
    public function showSubCategory()
    {
        $AllCategory = Category::all();
        $AllSubCategory = SubCategory::with('category')->get();
        return view('settingpages/subcategory',  ['AllCategoryData' => $AllCategory], ['SubCategoryCollection' => $AllSubCategory]);
    }

    // Add subCategory
    public function addSubCategory(Request $request)
    {
        $validated = $request->validate(
            [
                'category_id' => 'required|exists:category,id',
                'Sub_Category_Name' => 'required|string|max:100',
            ],
            [
                'category_id' => 'Enter Category Name!',
                'Sub_Category_Name.required' => 'Enter Sub Category Name!',
            ]
        );

        // Check if the same subcategory already exists under the same category
        $existing = SubCategory::where('category_id', $validated['category_id'])
            ->where('Sub_Category_Name', $validated['Sub_Category_Name'])
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'This Sub Category already exists under the selected Category!')->withInput();
        }
        SubCategory::create($validated);
        return redirect()->back()->with('success', 'Sub Category added successfully!');
    }


    // subCategory Edit page 
    public function EditshowSubCategory($Id)
    {
        $id = decrypt($Id);
        $AllSubCategory = SubCategory::with('category')->findOrFail($id);
        return view('edit/subcategoryEdit', ['AllSubCategory' => $AllSubCategory]);
    }




    //Sub Category  Updete 
    public function updateSubCategory(Request $request, $id)
    {
        $SubCategory = SubCategory::with('category')->findOrFail($id);
        // if we somthing change here we change 
        $validated = $request->validate([
            'Category_Name' => 'required|string|max:100|',
            'Sub_Category_Name' => 'required|string|max:100|'
        ], [
            'Category_Name.required' => 'Enter Category Name!',
            'Sub_Category_Name.required' => 'Enter Sub Category Name!',
            'Sub_Category_Name.unique' => 'This Sub Category already exists!',
        ]);

        $category = Category::where('Category_Name', $validated['Category_Name'])->first();

        if (!$category) {
            return redirect()->back()->with('error', 'Invalid Category Name!')->withInput();
        }
        $duplicate = SubCategory::where('category_id', $category->id)
            ->where('Sub_Category_Name', $validated['Sub_Category_Name'])
            ->where('id', '!=', $id)
            ->first();

        if ($duplicate) {
            return redirect()->back()->with('error', 'This Sub Category already exists under the selected Category!')->withInput();
        }

        // Save if no duplicate
        $SubCategory->Sub_Category_Name = $validated['Sub_Category_Name'];
        $SubCategory->save();
        return redirect()->route('show.subcategory.page')->with('success', 'SubCategory Updated successfully!');
    }



    // Unit 
    public function showUnit()
    {
        $AllUnit = Unit::all();
        return view('settingpages/unit', ['UnitCollection' => $AllUnit]);
    }
    // Add Unit 
    public function addUnit(Request $request)
    {
        $validated = $request->validate(
            [
                'Unit_Name' => 'required|string|max:100',
            ],
            [
                'Unit_Name.required' => 'Please Enter Unit Name!',
                'Unit_Name.unique' => 'This Unit already exists!',
            ]
        );

        // Check if the same subcategory already exists under the same category
        $existing = Unit::where('Unit_Name', $validated['Unit_Name'])
            ->where('Unit_Name', $validated['Unit_Name'])
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'This Unit Name already exists!')->withInput();
        }
        Unit::create($validated);
        return redirect()->back()->with("success", "Unit added successfully");
    }

    // Edit Unit Page 
    public  function EditshowUnit($Id)
    {
        $id = decrypt($Id);
        $AllUnit = Unit::findOrFail($id);
        return view('edit/unitEdit', ['AllUnit' => $AllUnit]);
    }

    // Update Unit 
    public function updateUnit(Request $request, $id)
    {
        $AllUnit = Unit::findOrFail($id);

        $validated = $request->validate(
            [
                'Unit_Name' => 'required|string|max:100',
            ],
            [
                'Unit_Name.required' => 'Please Enter Unit Name!',
            ]
        );

        $existing = Unit::where('Unit_Name', $validated['Unit_Name'])
            ->where('id', '!=', $id)
            ->first();

        if ($existing) {
            return redirect()->back()
                ->with('error', 'This Unit Name already exists!')
                ->withInput();
        }

        $AllUnit->Unit_Name = $validated['Unit_Name'];
        $AllUnit->save();

        return redirect()->route('show.unit.page')->with('success', 'Unit Updated successfully!');
    }







    // Company 
    public function showCompany()
    {
        $GetAllData = Company::first();
        $states =State::all();
        return  view('settingpages/companyInformation', ['company' => $GetAllData], ['states' =>$states]);
    }

    // Company update 
    public function updateCompany(Request $request, $id)
    {
        // return $request;
        $AllCompanyInformation = Company::findOrFail($id);

        $request->validate([
            'organization_name' => 'required|string|max:150',
            'contact' => 'required|string|digits:10',
            'email' => 'required|email|',
            'gst_in' => 'nullable|string|max:15',
            'pan' => 'nullable|string|size:10',
            'office_address' => 'required|string',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pin_code' => 'required|digits:6',
            'account_name' => 'required|string|max:100',
            'account_number' => 'required|digits_between:6,20',
            'ifsc' => 'required|regex:/^[A-Z]{4}0[A-Z0-9]{6}$/i|max:11', // Valid IFSC format
            'bank_name' => 'required|string|max:100',
            'branch_name' => 'required|string|max:100',
        ], [
            'organization_name.required' => 'Please enter the organization name.',
            'contact.required' => 'Please enter the contact number.',
            'email.required' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'gst_in.unique' => 'This GSTIN already exists.',
            'pan.unique' => 'This PAN already exists.',
            'office_address.required' => 'Please enter the office address.',
            'city.required' => 'Please enter the city.',
            'state.required' => 'Please enter the state.',
            'pin_code.required' => 'Please enter the pin code.',
            'account_name.required' => 'Please enter the account holder name.',
            'account_number.required' => 'Please enter the account number.',
            'account_number.unique' => 'This account number already exists.',
            'ifsc.required' => 'Please enter the IFSC code.',
            'bank_name.required' => 'Please enter the bank name.',
            'branch_name.required' => 'Please enter the branch name.',
            'pin_code.digits' => 'Pin code must be exactly 6 digits.',
            'contact.digits' => 'Phone Number must be 10 Digit',
            'ifsc.regex' => 'Please enter a valid IFSC code (e.g., SBIN0001234).',
            'account_number.digits_between' => 'Account number must be between 6 to 20 digits.',
            'pan.size' => 'PAN must be exactly 10 characters.',
        ]);

        $AllCompanyInformation->organization_name = $request->input('organization_name');
        $AllCompanyInformation->contact = $request->input('contact');
        $AllCompanyInformation->email = $request->input('email');
        $AllCompanyInformation->gst_in = $request->input('gst_in');
        $AllCompanyInformation->pan = $request->input('pan');
        $AllCompanyInformation->office_address = $request->input('office_address');
        $AllCompanyInformation->city = $request->input('city');
        $AllCompanyInformation->state = $request->input('state');
        $AllCompanyInformation->pin_code = $request->input('pin_code');
        $AllCompanyInformation->account_name = $request->input('account_name');
        $AllCompanyInformation->account_number = $request->input('account_number');
        $AllCompanyInformation->ifsc = $request->input('ifsc');
        $AllCompanyInformation->bank_name = $request->input('bank_name');
        $AllCompanyInformation->branch_name = $request->input('branch_name');
        $AllCompanyInformation->save();
        return redirect()->back()->with('success', 'Company information updated successfully!')->withInput();
    }

    public function logout()
    {
        session()->forget('loggedInUser');
        return redirect('/login')->with('success', 'Success to Logout!');
    }
}