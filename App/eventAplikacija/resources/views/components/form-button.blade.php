<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-md btn-success float-end mt-3 mb-2 text-uppercase', 'style' => 'font-size: 14px !important']) }}>
    {{ $slot }}
</button>
