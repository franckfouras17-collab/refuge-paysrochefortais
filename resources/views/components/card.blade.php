@props(['as' => 'div'])
@php $tag = $as; @endphp
<{{ $tag }} {{ $attributes->merge(['class' => 'rounded-2xl border border-line bg-paper p-6 sm:p-7 transition-shadow duration-200 hover:shadow-[0_8px_28px_-14px_rgba(43,58,64,0.35)]']) }}>
  {{ $slot }}
</{{ $tag }}>
