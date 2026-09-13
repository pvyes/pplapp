<div class="media-container">
    <div><strong>Fileurl:</strong> <span x-text="selectedItem.file[0].mime"></span></div>
    {{-- 1. Check if the file is a Video --}}
    <template x-if="selectedItem.file[0].mime.startsWith('video/')">
      <video width="100%" height="auto" controls>
          <source src="{{ "selectedItem.file[0].url" }}" type="{{ "selectedItem.file[0].mime" }}">
          Uw browser ondersteunt de videotag niet.
      </video>
    </template>
    {{-- 2. Check if the file is an Audio file --}}
    <template x-if="selectedItem.file[0].mime.startsWith('audio/')">
      <audio controls class="w-full">
          <source src="{{ "selectedItem.file[0].url" }}" type="{{ "selectedItem.file[0].mime" }}">
          Uw browser ondersteunt de audiotag niet.
      </audio>
    </template>

    {{-- 3. Check if the file is an Image --}}
    <template x-if="selectedItem.file[0].mime.startsWith('image/')">
      <img src="{{ "selectedItem.file[0].url" }}" alt="Media content" class="img-fluid" />
    </template>
    {{-- 4. Check if the file is a PDF --}}
    <template x-if="selectedItem.file[0].mime === 'application/pdf')">
        <iframe src="{{ "selectedItem.file[0].url" }}" width="100%" height="600px">
          <p>Uw browser ondersteunt het weergeven van pdf's niet. 
              <a href="{{ "selectedItem.file[0].url" }}" target="_blank">Download de PDF</a>.
          </p>
        </iframe >
      </template>

    {{-- 5. Fallback for document links (Word, Excel, ZIP, etc.) --}}
    <!--TODO 
        <p>Bestandstype wordt niet ondersteund voor directe weergave.</p>
    </div-->
</div>
