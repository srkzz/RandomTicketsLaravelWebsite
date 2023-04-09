<x-layout>  
  <x-card class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">
          <h2 class="text-2xl font-bold uppercase mb-1">
              Criar um Pedido
          </h2>
          <p class="mb-4">Cria um pedido encontra soluções!</p>
      </header>

      <form method="POST" action="/listings" enctype="multipart/form-data">
        @csrf   
        <div class="mb-6">
              <label for="company" class="inline-block text-lg mb-2">Nome da Empresa</label>
              <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company" value="{{old('company')}}" />

                @error('company')
                 <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

          </div>

          <div class="mb-6">
              <label for="title" class="inline-block text-lg mb-2">Titulo do Trabalho</label>
              <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{old('title')}}"
                  placeholder="Example: Senior Laravel Developer" />
                  @error('title')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror
          </div>

          <div class="mb-6">
              <label for="location" class="inline-block text-lg mb-2">Localização</label>
              <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" value="{{old('location')}}"
                  placeholder="Example: Remote, Boston MA, etc" />
                  @error('location')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror
          </div>

          <div class="mb-6">
              <label for="email" class="inline-block text-lg mb-2">Email</label>
              <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />
              @error('email')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
          </div>

          <div class="mb-6">
              <label for="website" class="inline-block text-lg mb-2">
                  Website
              </label>
              <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website" value="{{old('website')}}" />
              @error('website')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
          </div>

          <div class="mb-6">
              <label for="tags" class="inline-block text-lg mb-2">
                  Tags (Comma Separated)
              </label>
              <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" value="{{old('tags')}}"
                  placeholder="Example: Laravel, Backend, Postgres, etc" />
                  @error('tags')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror
          </div>

          <div class="mb-6">
              <label for="logo" class="inline-block text-lg mb-2">
                    Logo
              </label>
              <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
              @error('logo')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror
          </div> 

          <div class="mb-6">
              <label for="description" class="inline-block text-lg mb-2">
                  Descrição
              </label>
              <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" 
                  placeholder="Include tasks, requirements, salary, etc">{{old('company')}}</textarea>
                  @error('description')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror
          </div>

          <div class="mb-6">
              <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                  Criar Pedido
              </button>

              <a href="/" class="text-black ml-4"> Retroceder </a>
          </div>
      </form>
    </x-card>
</x-layout>