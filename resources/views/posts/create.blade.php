<x-layout>
    <section class="px-6 py-6">
        <x-panel class="max-w-sm mx-auto">

            <form action="/admin/posts" method="POST" enctype="multipart/form-data">
                @csrf

                <x-form.input name="thumbnail" type="file"/>
                <x-form.input name="title" />
                <x-form.input name="slug" />
                <x-category-select name="category_id" />
    
                <x-form.textarea name="excerpt" /> 
                <x-form.textarea name="body" />

                <x-form.submit />
                
            </form>
        </x-panel>
    </section>
</x-layout>
    