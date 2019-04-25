<template>
    <div class="catalogue">
        <book-card v-for="(book, index) in books" :key="index"
                   :book="book"
        >
        </book-card>
    </div>
</template>
<script>
    import BookCard from './BookCard'
    export default {
        name: "Catalogue",
        components: {
            BookCard
        },
        props: {
            books: {
                type: Array,
                required: true
            },

        }
    }
</script>

<style>
    .catalogue {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
    }
</style>