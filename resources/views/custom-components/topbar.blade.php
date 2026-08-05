<header class="flex items-end justify-end gap-6 pr-4 py-5 bg-white">
    <div class="shrink-0 bg-primary rounded-full py-2.5 px-5 shadow-sm shadow-[#7B5DFE]/10">
        <p class="text-xs text-white font-semibold flex items-center gap-2 tracking-wide">
            <i class="ri-calendar-line text-white text-sm"></i>
            {{ now()->format('l, d M Y') }}
        </p>
    </div>
</header>
