
<div>

    <div class="content">
         <!-- Heading -->
         <div class="block block-rounded">
            <div class="block-content block-content-full">
              <div class="py-3 text-center">
                <h1 class="h3 fw-extrabold mb-1">
                  Create Question
                </h1>
                <h2 class="fs-sm fw-medium text-muted mb-0">
                    Add Question to "{{ $game->name }}"
                </h2>
              </div>
            </div>
          </div>
          <!-- END Heading -->

        <div class="block block-rounded">
            {{-- <div class="block-header">
                <h3 class="block-title"></h3>
            </div> --}}

            <div class="block-content">

                @if (session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <form wire:submit.prevent="create">
                    <div class="form-group">
                        <label>Question Text</label>
                        <input type="text" wire:model="text" class="form-control">
                        @error('text') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <label>Options</label>
                    @foreach ($options as $index => $option)
                        <div class="form-group d-flex align-items-center">
                            <input type="text" wire:model="options.{{ $index }}" class="form-control me-2">
                            <div class="form-check">
                                <input type="radio" wire:model="correctOption" value="{{ $index }}" class="form-check-input">
                                <label class="form-check-label">Correct</label>
                            </div>
                        </div>
                        @error("options.$index") <small class="text-danger">{{ $message }}</small> @enderror
                    @endforeach

                    @error('correctOption') <small class="text-danger d-block">{{ $message }}</small> @enderror

                    <button class="btn btn-primary mt-3">Save Question</button>
                </form>
            </div>
        </div>
    </div>

</div>

