<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="url('images/img_174839.png')" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#035efc",
                        },
                    },
                },
            };
        </script>
         </head>

            
            <section
            class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4"
            
        >
            <div
                class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
                style="background-image: url('images/img_174839.png')"
                
                
            >
            
        </div>
            
          

            <div class="z-10">
                <h1 class="text-6xl font-bold uppercase text-white">
                 @php   echo __('meals.title'); @endphp
                </h1>
                <div style = "position:relative; right:700px; top:2px; ">
                    
                <li class="nav-item">  <a href="/en">{{'EN'}} </a> </li>
            <li class="nav-item">  <a href="/jp">{{'JP'}} </a> </li>
                </div>
            </div>
        </section>
        <main>
           
            <!-- Search -->
            <form action="">
                <div class="relative border-2 border-gray-100 m-4 rounded-lg">
                    <div class="absolute top-4 left-3">
                        <i
                            class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
                        ></i>
                    </div>
                    <input
                        type="text"
                        name="search"
                        class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                        placeholder=@php  echo __('meals.SearchText'); @endphp
                    />
                    <div class="absolute top-2 right-2">
                        <button
                            type="submit"
                            class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600"
                        >
                        @php   echo __('meals.search'); @endphp
                        </button>
                    </div>
                </div>
            </form>
            <div
            class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
        >
        
            <!-- Item 1 -->@foreach($meals as $meal)
            <div class="bg-gray-50 border border-gray-200 rounded p-6">
                <div class="flex">
                   
                    <div>
                        <h3 class="text-2xl">
                            {{$meal['title']}}
                        </h3>
                        <div class="text-xl font-bold mb-4">
                            @php $catId = \App\models\Category::find($meal->category_id)@endphp
                    
                            @if($catId==null)
                            @php   echo __('meals.NoCat'); @endphp
                            <br>
                            @else
                            @php   echo __('meals.category'); @endphp
                            {{$catId->title}}
                            <br>
                            @endif

                            <br>
                            <em>{{$meal->description->description}}</em>
                            
                        </div>

                        @php   echo __('meals.Ing'); @endphp
                        @foreach($meal->ingredients as $ingredient)
                        
                            {{$ingredient->title}}
                            <br>
                        
                        @endforeach
<br>
<br>


                @php   echo __('meals.title'); @endphp
                        <ul class="flex"> @foreach($meal->tag as $tag)
                            <li
                                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                            >
                               
                                <a href="/?tag={{$tag->title}}">{{$tag->title}}</a>
                               
                            </li>
                            @endforeach
                        </ul>
                       
                    </div>
                </div>
            </div>
            @endforeach



 {{$meals->links()}}   

  