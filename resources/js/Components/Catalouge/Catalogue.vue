<template>
    <div>
        <div class="field has-addons">
            <div class="control search-control has-icons-left">
                <input class="input" type="search" v-model="searchWord">
                <span class="icon is-small is-left">
                    <i class="fas fa-search fa-xs"></i>
                </span>
            </div>
            <div class="control">
                <a class="button is-info" @click="search">
                    Buscar
                </a>
            </div>
        </div>
        <div class="catalogue">
            <book-card v-for="(book, index) in displayedBooks" :key="index"
                       :book="book"
            >
            </book-card>
        </div>
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
            }

        },
        data() {
            return {
                displayedBooks: this.books,
                searchWord: ''
            }
        },

        methods: {
            search(){
                this.displayedBooks = this.books.filter(book => {
                    return book.title.toLowerCase().includes(this.searchWord.toLowerCase())
                        || book.authorsList.toLowerCase().includes(this.searchWord.toLowerCase());
                });
            }
        }
    }
</script>

<style lang="scss">
    $below-tablet: "only screen and (max-width : 720px)";
    .catalogue {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    .field {
        margin-left: 1rem;

    }

    .search-control {

    @media #{$below-tablet}{
        flex-grow: 0.9;
    }
    }
</style>