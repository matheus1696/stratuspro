<form {{ $attributes }} x-data="{ isSubmitting: false }" x-on:submit="isSubmitting = true">
    {{$slot}}
</form>