@extends('students.studentLayout')
   @section('title')
      Students
   @endsection
   @section('pageName')
      All Students
   @endsection
@section('content')
<div class="tw-bg-white tw-px-2 tw-pt-4 tw-pb-2 tw-rounded-lg tw-mt-6"> 
   @if (@isset($group))
   <h2 class="tw-text-lg tw-font-bold tw-text-gray-600 tw-mb-4">Students- {{$group}}</h2>
   @endif
    
   <div id="tableContainer" class="tw-overflow-x-auto">
   </div>
   <table class="tw-min-w-full tw-bg-white tw-border">
     <thead class="tw-bg-purple-600 tw-text-white">
         <tr class="tw-border">
             <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Roll</th>
             <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Name</th>
             <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Semester</th>
             <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Group</th>
             <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-md tw-text-start">Email</th>
         </tr> 
     </thead>
     <tbody>
     @foreach ($students as $student)
         <tr class="tw-hover:bg-gray-100 tw-border tw-duration-200">
           <td class="tw-py-2 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{ $student->roll }}.</td>
           <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{ $student->name }}</td>
           <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{ $student->semester }}</td>
           <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{ $student->group }}</td>
           <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-start">{{ $student->email }}</td>
         </tr>
     @endforeach
     </tbody>
   </table>
   <div class="tw-flex tw-justify-end tw-mt-4">
     <p class="">{{ $students->links() }}</p>
   </div>
 </div>
@endsection