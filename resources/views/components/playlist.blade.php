@props(['playlist'])

<div class="card bg-base-100 shadow">
    <div class="card-body">
        <div class="flex space-x-3">
            @if ($playlist->user)
                <div class="avatar">
                    <div class="size-10 rounded-full">
                        <img src="{{$playlist->user->avatar}}" style="background-color:LavenderBlush">
                        <div class="avatar-letter">{{$playlist->user->name[0]}}</div>
                    </div>
                </div>
            @else
                <div class="avatar placeholder">
                    <div class="size-10 rounded-full border border-base-content/20 bg-base-content/10 text-base-content/60">
                        <img style="background-color:LavenderBlush"
                            alt="Anonymous User" class="rounded-full" />
                    </div>
                </div>
            @endif
            <div class="min-w-0 flex-1 space-x-3">
                <div class="flex flex-col gap-4">
                    <div class="flex items-center bg-gray-500 p-4 text-white">
                        <p class="mt-1 font-bold">{{ $playlist->title }}</p>
                        <p class="mt-1">{{ $playlist->description }}</p>
                        @can('update', $playlist)
                            <div class="flex gap-1">
                                <a href="/playlists/{{ $playlist->id }}/edit" class="btn btn-ghost btn-xs">
                                    Edit
                                </a>
                            </div>
                        @endcan
                        @can('delete', $playlist)
                            <form method="POST" action="/playlists/{{ $playlist->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this playlist?')"
                                    class="btn btn-ghost btn-xs text-error">
                                    Delete
                                </button>
                            </form>
                        @endcan
                    </div>
                    <div class="flex gap-1">
                        <div class="flex items-center gap-1">
							<span class="text-sm text-base-content/60">{{ $playlist->created_at->diffForHumans() }}</span>
                            @if ($playlist->updated_at->gt($playlist->created_at->addSeconds(5)))
                              <span class="text-base-content/60">·</span>
                              <span class="text-sm text-base-content/60 italic">edited {{ $playlist->updated_at->diffForHumans() }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>