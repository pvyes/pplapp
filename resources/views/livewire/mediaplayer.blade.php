<div class="media-container">
    @php
        $isNotSupported = true;
    @endphp

    {{-- 1. Check if the file is a Video --}}
    @if(str_starts_with($file['mime'], 'video/'))
        {{ $isNotSupported = false; }}
        <video width="100%" height="auto" controls>
            <source src="{{ $file['url'] }}" type="{{ $file['mime'] }}">
            Uw browser ondersteunt de videotag niet.
        </video>
    @endif

    {{-- 2. Check if the file is an Audio file --}}
    @if(str_starts_with($file['mime'], 'audio/'))
        {{ $isNotSupported = false; }}  
        <audio controls class="w-full">
            <source src="{{ $file['url'] }}" type="{{ $file['mime'] }}">>
            Uw browser ondersteunt de audiotag niet.
        </audio>
    @endif

    {{-- 3. Check if the file is an Image --}}
    @if(str_starts_with($file['mime'], 'image/'))
        {{ $isNotSupported = false; }} 
        <img src="{{ $file['url'] }}" alt="Media content" class="img-fluid" />
    @endif

    {{-- 4. Check if the file is a PDF --}}
    @if(strcmp($file['mime'], 'application/pdf') == 0)
        {{ $isNotSupported = false; }} 
        <iframe src="{{ $file['url'] }}" width="100%" height="600px">
          <p>Uw browser ondersteunt het weergeven van pdf's niet. 
              <a href="{{ $file['url'] }}" target="_blank">Download de PDF</a>.
          </p>
        </iframe >
    @endif

    {{-- 5. Fallback for document links (Word, Excel, ZIP, etc.) --}}
    @if ($isNotSupported)
        <p>Bestandstype wordt niet ondersteund voor directe weergave.</p>
    @endif
</div>
