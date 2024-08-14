@extends('students.studentLayout')
   @section('title')
      Students
   @endsection
   @section('pageName')
      All Students
   @endsection
@section('content')
<div class="tw-bg-white tw-px-2 tw-pt-4 tw-pb-2 tw-rounded-lg tw-mt-56"> 
   @if (@isset($group))
   <h2 class="tw-text-lg tw-font-bold tw-text-gray-600 tw-mb-4">Students- {{$group}}</h2>
   @endif

   <table class="tw-min-w-full tw-bg-white tw-border tw-rounded-lg tw-overflow-hidden">
     <thead class="tw-bg-purple-600 tw-text-white">
         <tr class="tw-border">
             <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-center">Roll</th>
             <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-center">Name</th>
             <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-center">Semester</th>
             <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-center">Group</th>
             <th class="tw-py-2 tw-px-4 tw-font-semibold tw-text-sm tw-text-center">Email</th>
         </tr> 
     </thead>
     <tbody>
     @foreach ($students as $student)
         <tr class="hover:tw-bg-gray-100 tw-border tw-duration-200">
           <td class="tw-py-2 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-center">{{ $student->roll }}.</td>
           <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-center">{{ $student->name }}</td>
           <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-center">{{ $student->semester }}</td>
           <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-center">{{ $student->group }}</td>
           <td class="tw-py-1 tw-px-4 tw-font-medium tw-text-sm tw-text-gray-600 tw-text-center">{{ $student->email }}</td>
         </tr>
     @endforeach
     </tbody>
   </table>
   <div class="tw-flex tw-justify-end tw-mt-4">
     <p class="">{{ $students->links() }}</p>
   </div>
 </div>
@endsection