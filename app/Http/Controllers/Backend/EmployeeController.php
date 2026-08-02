<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;


class EmployeeController extends Controller
{
    //
    public function AllEmployee(){

        $employee = Employee::latest()->get();
        return view('backend.employee.all_employee',compact('employee'));
    } // End Method 

    public function AddEmployee(){
        return view('backend.employee.add_employee');
    } // End Method 


    public function StoreEmployee(Request $request){

        $validateData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|unique:employees|max:200',
            'phone' => 'required|max:200',
            'address' => 'required|max:400',
            'salary' => 'required|max:200',
            'vacation' => 'required|max:200', 
            'experience' => 'required', 
            'image' => 'required',  
        ],
        
            [
                'name.required' => 'This Employee Name Field Is Required',
            ]

        );
 

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        // ✅ Save image without Intervention
        $image->move(public_path('upload/employee'), $name_gen);
        $save_url = 'upload/employee/'.$name_gen;

        Employee::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'experience' => $request->experience,
            'salary' => $request->salary,
            'vacation' => $request->vacation,
            'city' => $request->city,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Employee Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.employee')->with($notification); 
    } // End Method 


    public function EditEmployee($id){
        $employee = Employee::findOrFail($id);
        return view('backend.employee.edit_employee',compact('employee'));
    } // End Method 

    public function UpdateEmployee(Request $request)
    {
        $employee_id = $request->id;

        $employee = Employee::findOrFail($employee_id);

        // Base data
        $data = [
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'experience' => $request->experience,
            'salary'     => $request->salary,
            'vacation'   => $request->vacation,
            'city'       => $request->city,
            'updated_at' => Carbon::now(), // ✅ use updated_at instead
        ];

        // If new image uploaded
        if ($request->hasFile('image')) {

            // Delete old image (optional but recommended)
            if (file_exists(public_path($employee->image))) {
                unlink(public_path($employee->image));
            }

            $image     = $request->file('image');
            $name_gen  = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/employee'), $name_gen);

            $data['image'] = 'upload/employee/' . $name_gen;
        }

        $employee->update($data);

        $notification = [
            'message'    => 'Employee Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.employee')->with($notification);
    }


    public function DeleteEmployee($id)
    {
        $employee = Employee::findOrFail($id);

        // Full path to image
        $imagePath = public_path($employee->image);

        // Check if file exists before deleting
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $employee->delete();

        $notification = [
            'message'    => 'Employee Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

}
