<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\State;
use Illuminate\Http\Request;

class contactController extends Controller
{
    //Show Contact Form
    public function showContact()
    {

        $states = State::all();
        return view('contact/addContact', ["states" => $states]);
    }
    // Add Contact 
    public function addContact(Request $request)
    {
        $validated = $request->validate(
            [
                // Basic info
                'name' => ['required', 'string', 'max:150', 'regex:/^[A-Za-z\s]+$/'],
                'email' => 'nullable|email|max:255',
                'contact' => 'nullable|string|digits:10',
                'website' => 'nullable|url|max:255',

                // Billing address
                'billaddress' => 'nullable|string|max:255',
                'billstate' => 'nullable|exists:states,id', // assuming `states` table
                'billcity' => 'nullable|string|max:100',
                'billpin' => 'nullable|digits:6',

                // Shipping address
                'shippaddress' => 'nullable|string|max:255',
                'shippstate' => 'nullable|exists:states,id',
                'shippcity' => 'nullable|string|max:100',
                'shipppin' => 'nullable|digits:6',

                // Other info
                'gsttreatment' => 'required|string|max:100',
                'gstin' => 'nullable|string|size:15',
                'pan' => 'nullable|string|size:10',
                'sourceofsupply' => 'required|exists:states,id',
            ],
            [
                // Basic Info
                'name.required' => 'Please enter the name.',
                'name.string' => 'Name must be a valid string.',
                'name.max' => 'Name must not exceed 150 characters.',
                'name.regex' => 'Name can only contain letters and spaces. Numbers are not allowed.',

                // Other Info
                'gsttreatment.required' => 'Please select GST treatment.',
                'gsttreatment.string' => 'GST treatment must be a valid string.',

                'gstin.string' => 'GSTIN must be a valid string.',
                'gstin.size' => 'GSTIN must be exactly 15 characters.',

                'pan.string' => 'PAN must be a valid string.',
                'pan.size' => 'PAN must be exactly 10 characters.',

                'sourceofsupply.required' => 'Please select the source of supply.',
                'sourceofsupply.exists' => 'Please select a valid source of supply.',

                // 'email.email' => 'Please enter a valid email address.',

                // 'contact.required' => 'Please enter the contact number.',
                // 'contact.string' => 'Contact must be a valid string.',
                'contact.digits' => 'Contact must be exactly 10 digits.',

                'website.url' => 'Please enter a valid website URL.',

                // Billing Address
                // 'billaddress.required' => 'Please enter the billing address.',
                'billaddress.string' => 'Billing address must be a valid string.',

                // 'billstate.required' => 'Please select a billing state.',
                // 'billstate.exists' => 'Please select a valid billing state.',

                // 'billcity.required' => 'Please enter the billing city.',
                'billcity.string' => 'Billing city must be a valid string.',

                // 'billpin.required' => 'Please enter the billing PIN code.',
                // 'billpin.digits' => 'Billing PIN must be exactly 6 digits.',

                // Shipping Address
                // 'shippaddress.required' => 'Please enter the shipping address.',
                'shippaddress.string' => 'Shipping address must be a valid string.',

                // 'shippstate.required' => 'Please select a shipping state.',
                'shippstate.exists' => 'Please select a valid shipping state.',

                // 'shippcity.required' => 'Please enter the shipping city.',
                'shippcity.string' => 'Shipping city must be a valid string.',

                // 'shipppin.required' => 'Please enter the shipping PIN code.',
                'shipppin.digits' => 'Shipping PIN must be exactly 6 digits.',


            ]

        );
        Contact::create($validated);
        return redirect()->back()->with('success', 'Contact added successfully!')->withInput();
    }


    // Show Contact Data 
    public function contactData()
    {
        $contacts = Contact::with(['billingState', 'shippingState', 'sourceOfSupplyState'])->get();
        // return $contacts;
        return view('contact/showContact', ['contactDetails' => $contacts]);
    }


    // show update form 
    public function showUpdateContact(Request $request, $Id)
    {
        $id = decrypt($Id);
        $getContactData = Contact::with(['billingState', 'shippingState', 'sourceOfSupplyState'])->findOrFail($id);
        $state = State::all();
        return view('contact/showUpdateContact', ['contacts' => $getContactData, "states" => $state]);
    }
    // update data 
    public function update(Request $request, $id)
    {

        $Id = decrypt($id);
        $contact = Contact::findOrFail($Id);

        $validated = $request->validate(
            [
                // Basic info
                'name' => ['required', 'string', 'max:150', 'regex:/^[A-Za-z\s]+$/'],
                'email' => 'nullable|email|max:255',
                'contact' => 'nullable|string|digits:10',
                'website' => 'nullable|url|max:255',

                // Billing address
                'billaddress' => 'nullable|string|max:255',
                'billstate' => 'nullable|exists:states,id',
                'billcity' => 'nullable|string|max:100',
                'billpin' => 'nullable|digits:6',

                // Shipping address
                'shippaddress' => 'nullable|string|max:255',
                'shippstate' => 'nullable|exists:states,id',
                'shippcity' => 'nullable|string|max:100',
                'shipppin' => 'nullable|digits:6',

                // Other info
                'gsttreatment' => 'required|string|max:100',
                'gstin' => 'nullable|string|size:15',
                'pan' => 'nullable|string|size:10',
                'sourceofsupply' => 'required|exists:states,id',
            ],
            [
                // Basic Info
                'name.required' => 'Please enter the name.',
                'name.string' => 'Name must be a valid string.',
                'name.max' => 'Name must not exceed 150 characters.',
                'name.regex' => 'Name can only contain letters and spaces. Numbers are not allowed.',

                // Other Info
                'gsttreatment.required' => 'Please select GST treatment.',
                'gsttreatment.string' => 'GST treatment must be a valid string.',

                'gstin.string' => 'GSTIN must be a valid string.',
                'gstin.size' => 'GSTIN must be exactly 15 characters.',

                'pan.string' => 'PAN must be a valid string.',
                'pan.size' => 'PAN must be exactly 10 characters.',

                'sourceofsupply.required' => 'Please select the source of supply.',
                'sourceofsupply.exists' => 'Please select a valid source of supply.',


                'contact.digits' => 'Contact must be exactly 10 digits.',

                'website.url' => 'Please enter a valid website URL.',


                'billaddress.string' => 'Billing address must be a valid string.',



                'billcity.string' => 'Billing city must be a valid string.',


                'shippaddress.string' => 'Shipping address must be a valid string.',

                'shippstate.exists' => 'Please select a valid shipping state.',
                'shippcity.string' => 'Shipping city must be a valid string.',
                'shipppin.digits' => 'Shipping PIN must be exactly 6 digits.',


            ]

        );


        $contact->update($validated);


        return redirect()->back()->with('success', 'Contact Update Successfully!');
    }
}