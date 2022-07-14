 <div {{ $attributes ->merge(['class'=> 'bg-gray-50 border border-gray-200 rounded p-6']) }}>
    <!--This will print the shit that was on the caller--> 
    {{ $slot }}
 </div>
