<template>
    <div class="card book">
        <carousel :photos="book.photos"></carousel>
        <div class="card-content">
            <a :href="book.id">
                <p class="title" v-text="book.title"></p>
            </a>
            <p class="subtitle" v-text="book.authorsList"></p>
            <div class="content" v-text="book.about">
            </div>
        </div>
    </div>
</template>
<script>
    import Carousel from '../Utilities/Carousel'

    export default {
        name: "BookCard",
        components: {
            Carousel
        },
        props: {
            book: {
                type: Object,
                required: true
            }
        }
    }
</script>

<style scoped>
    .book {
        max-width: 30%;
        margin: 1rem;

    }
</style>