<image-manager v-if="object.id" :url="'{{Request::url() }}/photo' + (object.id ? `/${object.title}` : '')"  :data="{
						_token: '{{csrf_token()}}'
					}"
			   :image-url="'{{Request::url() }}/photos' + (object.id ? `/${object.title}` : '')"
			   :delete-url="'{{Request::url() }}/photo' + (object.id ? `/${object.title}` : '')">
</image-manager>
@if($errors->has('photos'))
<p class="help is-danger">{{$errors->first('photos')}}</p>
@endif