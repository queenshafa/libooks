@extends('front.base')

@section('content')
    <!-- Header -->
    <section
        class="relative w-full px-8 pt-48 pb-24 text-gray-700 bg-[radial-gradient(circle_at_50%_100%,rgba(253,224,71,0.4)_0%,transparent_60%),radial-gradient(circle_at_50%_100%,rgba(251,191,36,0.4)_0%,transparent_70%),radial-gradient(circle_at_50%_100%,rgba(244,114,182,0.5)_0%,transparent_80%)]">
        <div class="flex flex-col-reverse lg:flex lg:flex-row lg:justify-between">
            <div>
                <a href="{{ route('welcome') }}"
                    class="hidden lg:flex text-sm tracking-widest uppercase mb-4 hover:text-primary transition duration-300 ease-linear"><i
                        class="ri-arrow-left-line"></i> Back</a>
                <p class="mt-6 tracking-tight max-w-md leading-relaxed">
                    We believe the best ideas start with the right resources. That’s why
                    we’ve curated a vast selection of textbooks and non-fiction, making them
                    available to you instantly—no barriers, just pure learning to help you
                    reach your full potential.
                </p>
            </div>
            <div>
                <a href="{{ route('welcome') }}"
                    class="lg:hidden flex text-sm tracking-widest uppercase mb-4 hover:text-primary transition duration-300 ease-linear"><i
                        class="ri-arrow-left-line"></i> Back</a>
                <h1 class="text-5xl font-medium tracking-tight max-w-2xl leading-tight">
                    <span class="opacity-40">From our shelf, to your mind,</span> <br />
                    A complete archive for the modern learner.
                </h1>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="relative px-8 py-16 bg-white">
        <h2 class="text-2xl font-medium tracking-tight">Collections</h2>

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
@endsection
