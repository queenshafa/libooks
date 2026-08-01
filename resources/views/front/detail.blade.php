@extends('front.base')

@section('content')
    <!-- Main -->
    <section class="min-h-screen bg-white py-8 px-8 lg:px-16">
        <div class="max-w-7xl mx-auto w-full flex flex-col lg:flex-row lg:items-center lg:gap-24">
            <span>
                <a href="{{ route('welcome') }}" class="bg-primary py-2 px-6 my-4 lg:text-lg rounded-lg text-white"><i
                        class="ri-arrow-left-line"></i> Back</a>
            </span>
        </div>
        <div class="flex items-center mt-4 lg:mt-8">
            <div class="max-w-7xl mx-auto w-full flex flex-col lg:flex-row lg:items-center lg:gap-24">
                <div
                    class="bg-primary flex flex-col justify-center items-center w-full lg:w-1/2 min-h-[500px] lg:h-[750px] rounded-br-2xl rounded-tl-2xl p-12 shadow-xl">
                    <img src="{{ asset('storage/' . $book->cover) }}" alt="The Let Them Theory"
                        class="w-64 lg:w-80 shadow-2xl transition-transform hover:scale-105 duration-300" />
                </div>

                <div class="w-full lg:w-1/2 mt-12 lg:mt-0">
                    @if ($book->stock > 0)
                        <span
                            class="bg-primary text-white py-1.5 px-3 rounded-full text-sm tracking-tight">{{ $book->stock }}
                            in
                            stock</span>
                    @else
                        <span class="bg-primary text-white py-1.5 px-3 rounded-full text-sm tracking-tight">Out of
                            stock</span>
                    @endif
                    <h1 class="text-4xl lg:text-7xl font-bold mb-4 tracking-tight mt-4">
                        {{ $book->title }}
                    </h1>
                    <p class="text-gray-500 text-lg mb-8">By {{ $book->author }}</p>

                    <div class="mb-8">
                        <h3 class="mb-4 text-xl font-bold">Choose your cover type</h3>
                        <ul class="grid grid-cols-2 gap-4">
                            <li>
                                <input type="radio" id="hardcover" name="cover" class="hidden peer" required />
                                <label for="hardcover"
                                    class="flex items-center justify-center p-5 bg-secondary rounded-2xl cursor-pointer border-2 border-transparent peer-checked:border-primary peer-checked:bg-primary peer-checked:text-white transition-all font-semibold">
                                    Hard Cover
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="softcover" name="cover" class="hidden peer" />
                                <label for="softcover"
                                    class="flex items-center justify-center p-5 bg-secondary rounded-2xl cursor-pointer border-2 border-transparent peer-checked:border-primary peer-checked:bg-primary peer-checked:text-white transition-all font-semibold">
                                    Soft Cover
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="mb-10">
                        <h3 class="mb-4 text-xl font-bold">
                            Choose your library location
                        </h3>
                        <ul class="grid grid-cols-2 gap-4">
                            <li>
                                <input type="radio" id="loc1" name="loc" class="hidden peer" />
                                <label for="loc1"
                                    class="flex items-center justify-center p-5 bg-secondary rounded-2xl cursor-pointer border-2 border-transparent peer-checked:border-primary peer-checked:bg-primary peer-checked:text-white transition-all font-semibold text-center">
                                    Kelapa Gading
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="loc2" name="loc" class="hidden peer" />
                                <label for="loc2"
                                    class="flex items-center justify-center p-5 bg-secondary rounded-2xl cursor-pointer border-2 border-transparent peer-checked:border-primary peer-checked:bg-primary peer-checked:text-white transition-all font-semibold text-center">
                                    Shelburne
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="loc3" name="loc" class="hidden peer" />
                                <label for="loc3"
                                    class="flex items-center justify-center p-5 bg-secondary rounded-2xl cursor-pointer border-2 border-transparent peer-checked:border-primary peer-checked:bg-primary peer-checked:text-white transition-all font-semibold text-center">
                                    Toronto
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="loc4" name="loc" class="hidden peer" />
                                <label for="loc4"
                                    class="flex items-center justify-center p-5 bg-secondary rounded-2xl cursor-pointer border-2 border-transparent peer-checked:border-primary peer-checked:bg-primary peer-checked:text-white transition-all font-semibold text-center">
                                    Harapan Indah
                                </label>
                            </li>
                        </ul>
                    </div>

                    <a href="#loanForm"
                        class="block text-center w-full bg-gray hover:bg-black py-5 text-xl font-bold rounded-2xl text-white transition-all transform active:scale-[0.98]">
                        Borrow Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Desc -->
    <section class="min-h-screen bg-secondary py-16 px-8">
        <div class="flex flex-col lg:flex-row lg:gap-x-20 lg:mb-20">
            <div>
                <img src="/assets/all-books-img.jpg" alt="" class="rounded-2xl lg:w-7xl" />
            </div>
            <div class="lg:max-w-2xl">
                <h2 class="text-4xl font-bold mt-4">About {{ $book->title }}</h2>
                <p class="mt-4 font-light tracking-tight">
                    {{ $book->description }}
                </p>
            </div>
        </div>

        <div id="accordion-card" data-accordion="collapse" class="mt-8">
            <h2 id="accordion-card-heading-1">
                <button type="button"
                    class="flex items-center rounded-2xl bg-primary text-white justify-between cursor-pointer w-full p-5 font-medium rtl:text-right shadow-xs hover:text-heading hover:bg-neutral-secondary-medium gap-3 [&[aria-expanded='true']]:rounded-b-none [&[aria-expanded='true']]:shadow-none"
                    data-accordion-target="#accordion-card-body-1" aria-expanded="true"
                    aria-controls="accordion-card-body-1">
                    <span>Reviews</span>
                    <svg data-accordion-icon class="w-5 h-5 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m5 15 7-7 7 7" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-card-body-1" class="hidden bg-white text-gray rounded-b-2xl shadow-xs"
                aria-labelledby="accordion-card-heading-1">
                <div class="p-5">
                    <div class="border-b border-b-gray pb-5">
                        <h3>
                            <span>Eula Lawrence</span> -
                            <span>University of Toronto</span>
                        </h3>
                        <p class="text-amber-400 mt-2">
                            <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i
                                class="ri-star-fill"></i><i class="ri-star-fill"></i>
                        </p>
                        <p class="mt-4 font-light tracking-tight">
                            Digital Download was Nice. I was able to download a print and
                            bring it to Staples the same day.
                        </p>
                    </div>
                    <div class="border-b border-b-gray py-5">
                        <h3>
                            <span>Eula Lawrence</span> -
                            <span>University of Toronto</span>
                        </h3>
                        <p class="text-amber-400 mt-2">
                            <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i
                                class="ri-star-fill"></i><i class="ri-star-fill"></i>
                        </p>
                        <p class="mt-4 font-light tracking-tight">
                            Digital Download was Nice. I was able to download a print and
                            bring it to Staples the same day.
                        </p>
                    </div>
                    <div class="border-b border-b-gray py-5">
                        <h3>
                            <span>Eula Lawrence</span> -
                            <span>University of Toronto</span>
                        </h3>
                        <p class="text-amber-400 mt-2">
                            <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i
                                class="ri-star-fill"></i><i class="ri-star-fill"></i>
                        </p>
                        <p class="mt-4 font-light tracking-tight">
                            Digital Download was Nice. I was able to download a print and
                            bring it to Staples the same day.
                        </p>
                    </div>
                    <div class="pt-5">
                        <h3>
                            <span>Eula Lawrence</span> -
                            <span>University of Toronto</span>
                        </h3>
                        <p class="text-amber-400 mt-2">
                            <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i
                                class="ri-star-fill"></i><i class="ri-star-fill"></i>
                        </p>
                        <p class="mt-4 font-light tracking-tight">
                            Digital Download was Nice. I was able to download a print and
                            bring it to Staples the same day.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Loan Form & Book Details -->
    <section class="bg-white px-4 py-16" id="loanForm">
        <div class="max-w-full mx-auto flex flex-col lg:flex-row max-md:items-center justify-center gap-12 md:gap-x-16 ">
            <div class="min-w-3xl bg-primary rounded-[3rem] text-white flex flex-col justify-center p-12 lg:p-14">
                <h2 class="text-4xl lg:text-3xl font-semibold text-center mb-10">
                    Book Details
                </h2>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-16 lg:gap-y-24 gap-x-20 max-w-5xl mx-auto w-full">
                    <div class="flex flex-col gap-2">
                        <h3 class="font-bold text-xl lg:text-base opacity-70 uppercase tracking-widest">
                            Author
                        </h3>
                        <p class="font-medium text-3xl lg:text-2xl">{{ $book->author }}</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h3 class="font-bold text-xl lg:text-base opacity-70 uppercase tracking-widest">
                            Publisher
                        </h3>
                        <p class="font-medium text-3xl lg:text-2xl">
                            {{ $book->publisher }}
                        </p>
                    </div>

                    <div class="flex flex-col gap-2">
                        <h3 class="font-bold text-xl lg:text-base opacity-70 uppercase tracking-widest">
                            Publishing Year
                        </h3>
                        <p class="font-medium text-3xl lg:text-2xl">{{ $book->year }}</p>
                    </div>

                    <div class="flex flex-col gap-2">
                        <h3 class="font-bold text-xl lg:text-base opacity-70 uppercase tracking-widest">
                            Categories
                        </h3>
                        <p class="font-medium text-3xl lg:text-2xl">{{ $book->category->name }}</p>
                    </div>
                </div>
            </div>
            <div class="flex gap-x-10">

                <div class="w-full max-w-sm border border-zinc-300 rounded-2xl p-8">
                    @if ($book->stock > 0)
                        <h2 class="text-base font-medium text-zinc-800 mb-6">Loan Form</h2>
                        <form class="flex flex-col gap-4" action="{{ route('front.borrow', $book->id) }}"
                            method="POST">
                            @csrf
                            <div class="flex flex-col gap-2.5">
                                <label class="text-xs text-zinc-400">Name</label>
                                <input type="text" placeholder="Eula Lawrence" name="name"
                                    class="bg-zinc-50 border border-zinc-300 rounded-lg px-4 py-3 text-sm text-zinc-800 placeholder-zinc-400 outline-none focus:border-zinc-500 transition-colors" />
                                @error('name')
                                    <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-2.5">
                                <label class="text-xs text-zinc-400">Phone Number</label>
                                <input type="tel" placeholder="+1 234 567 89" name="phone"
                                    class="bg-zinc-50 border border-zinc-300 rounded-lg px-4 py-3 text-sm text-zinc-800 placeholder-zinc-400 outline-none focus:border-zinc-500 transition-colors" />
                                @error('phone')
                                    <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-2.5">
                                <label class="text-xs text-zinc-400">Borrowing Durations</label>
                                <select name="duration"
                                    class="bg-zinc-50 border border-zinc-300 rounded-lg px-4 py-3 text-sm text-zinc-800 outline-none focus:border-zinc-500 transition-colors appearance-none">
                                    <option value="3">3 Days</option>
                                    <option value="7">7 Days</option>
                                    <option value="14">14 Days</option>
                                </select>
                                @error('duration')
                                    <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="bg-black hover:bg-zinc-800 text-white text-base py-3 rounded-lg transition-colors cursor-pointer mt-2">
                                Send Loan Request
                            </button>
                            <p class="text-zinc-400 text-xs text-center">
                                Psst.. your information is secured and books borrowing is 100%
                                free!
                            </p>
                        </form>
                    @else
                        <h2 class="text-base text-center  font-medium text-zinc-800 mb-6">Out of stock!</h2>
                    @endif
                </div>
                <div class="flex flex-col justify-center mt-10">
                    <p class="text-sm max-md:text-center font-medium text-zinc-500 uppercase mb-2">
                        Borrowing Books?
                    </p>
                    <h1 class="text-5xl/14 max-md:text-center font-bold text-zinc-900 max-w-2xs mb-4">
                        Fill out this form!
                    </h1>
                    <p class="text-base/5.5 text-zinc-400 max-md:text-center max-w-2xs">
                        How to pick the book up? <br />
                        <br />
                        1. Fill out and submit the form. <br />
                        2. Save your loan code. <br />
                        3. Come to the library you choose and show our librarian the code!
                        <br />
                        4. Enjoy the book! Don't forget to return it!
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- You Might Also Like -->
    <section class="min-w-screen bg-white py-8 px-8">
        <h2 class="text-2xl font-light tracking-tight mt-4">
            You Might Also Like
        </h2>
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-4 mt-5">
            @forelse ($books as $book)
                <!-- Card -->
                <div
                    class="h-90 flex flex-col justify-between bg-secondary text-primary rounded-tl-2xl rounded-br-2xl group relative overflow-hidden">
                    <img src="/assets/all-books-img.jpg" alt=""
                        class="absolute inset-0 w-full h-full object-cover opacity-0 group-hover:opacity-100 transition-opacity duration-500" />
                    <div class="relative z-10 flex flex-col py-8 px-8 items-center justify-center mt-8">
                        <img src="{{ asset('storage/' . $book->cover) }}" alt="The Let Them Theory"
                            class="w-20 shadow-2xl group-hover:invisible transition-opacity duration-300" />
                        <p class="mt-8 font-light tracking-tight transition-colors duration-300">
                            {{ $book->category->name }}
                        </p>
                        <h3 class="mt-4 text-lg text-center font-semibold transition-colors duration-300">
                            {{ $book->title }}
                        </h3>
                    </div>
                    <div
                        class="relative z-10 bottom-0 flex justify-center visible lg:invisible group-hover:visible gap-x-4 bg-primary text-white w-full py-2 font-light">
                        <a href="{{ route('front.detail', $book->id) }}">View Book</a>
                    </div>
                </div>
            @empty
                <p class="text-center text-2xl font-bold">No new books currently available! Check back later!</p>
            @endforelse

        </div>
    </section>

    {{-- Modal --}}
    @if (session('borrow_success'))
        <div id="successModal"
            class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-6">
            <div
                class="relative w-full max-w-sm bg-white rounded-3xl shadow-xl overflow-hidden pt-10 pb-6 px-8 text-center">
                <h2 class="text-2xl font-bold text-slate-800">Book Borrowing Success!</h2>
                <p class="text-slate-500 text-sm mt-1">Please show the code below to our librarian when picking up the
                    book!</p>
                <div class="relative my-8">
                    <div class="border-t-2 border-dashed border-slate-200 w-full"></div>
                    <div class="absolute -left-12 -top-3 w-8 h-8 bg-slate-100 rounded-full"></div>
                    <div class="absolute -right-12 -top-3 w-8 h-8 bg-slate-100 rounded-full"></div>
                </div>
                <div class="grid grid-cols-2 gap-y-6 text-left mb-8">
                    <div>
                        <p class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Name</p>
                        <p class="font-bold text-slate-800">{{ session('borrow_name') }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Duration</p>
                        <p class="font-bold text-slate-800">{{ session('borrow_duration') }} days</p>
                    </div>
                    <div class="col-span-2 flex justify-between items-end border-t border-slate-50 pt-4">
                        <div>
                            <p class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Book Title</p>
                            <p class="font-bold text-slate-800">{{ $book->title }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Last Return</p>
                            <p class="font-bold text-red-500">{{ session('borrow_return') }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 rounded-2xl p-4 flex justify-center items-center gap-3 mb-10">
                    <div class="text-center text-sm p-2">
                        <p class="text-slate-400 text-sm text-center mb-3 mt-1">Your Code</p>
                        <p class="font-bold text-slate-800 text-3xl text-center leading-none">{{ session('borrow_code') }}
                        </p>
                    </div>
                </div>
                <div class="relative pt-6 border-t-2 border-dashed border-slate-200">
                    <button type="button" onclick="document.getElementById('successModal').style.display='none';"
                        class="block text-center w-full bg-primary hover:bg-gray py-5 text-base font-bold rounded-2xl text-white transition-all transform active:scale-[0.98] cursor-pointer">
                        Okay
                    </button>
                </div>

            </div>
        </div>
    @endif
@endsection
