<template>
	<div>
		<image-list :images="images" :delete-url="deleteUrl" @deleted="removeImage"></image-list>
		<image-upload :url="url" :data="data" @uploaded="uploaded"></image-upload>
	</div>
</template>

<script>
	import ImageList from './ImageList'
	import ImageUpload from "./ImageUpload";

	export default {
		name: "ImageManager",
		components: {
			ImageUpload,
			ImageList
		},

		props: {
			url: {
				type: String,
				required: true
			},

			deleteUrl: {
				type: String,
				default: false
			},
			data: {
				type: Object,
				default() {
					return {};
				}
			},
			imageUrl: {
				type: String,
				required: true
			}
		},

		data() {
			return {
				images: []
			}
		},

		mounted() {
			this.getImages();
		},

		methods: {
			uploaded(imageData) {
				this.images.push(imageData);
			},

			removeImage(image) {
				const index = this.images.findIndex((item) => {
					return item.id == image.id;
				});
				this.images.splice(index, 1);
			},
			async getImages(){
				const response = await axios.get(this.imageUrl);
				this.images = response.data
			}
		}
	}
</script>
