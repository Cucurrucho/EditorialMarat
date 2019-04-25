<image-manager v-if="object" :url="'{{Request::url() }}/photo' + (object.id ? `/${object.id}` : '')"  :data="{
						_token: '{{csrf_token()}}'
					}"
			   :image-url="'{{Request::url() }}/photos' + (object.id ? `/${object.id}` : '')"
			   :delete-url="'{{Request::url() }}/photo' + (object.id ? `/${object.id}` : '')">
</image-manager>
@if($errors->has('photos'))
<p class="help is-danger">{{$errors->first('photos')}}</p>
@endif