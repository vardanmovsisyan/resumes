<template>
    <div>
        <div class="heading">
            <h1>Categories</h1>
        </div>
        <category-component
                v-for="category in categories"
                v-bind="category"
                :key="category.id"
                @update="update"
                @delete="del"
        ></category-component>
        <div>
            <button @click="create()">Add new category</button>
        </div>
    </div>
</template>

<script>
    function Category({ id, name}) {
        this.id = id;
        this.name = name;
    }
    import CategoryComponent from './CategoryComponent.vue';
    export default {
        data() {
            return {
                categories: [],
                working: false
            }
        },
        methods: {
            create() {
                this.mute = true;
                window.axios.get('/admin/categories/create').then(({ data }) => {
                    this.categories.push(new Category(data));
                    this.mute = false;
                });
            },
            read() {
                this.mute = true;
                window.axios.get('/admin/categories').then(({ data }) => {
                    data.forEach(category => {
                        this.categories.push(new Category(category));
                    });
                    this.mute = false;
                });
            },
            update(id, color) {
                this.mute = true;
                window.axios.put(`/admin/categories/${id}/edit`, { name }).then(() => {
                    this.categories.find(category => category.id === id).name = name;
                    this.mute = false;
                });
            },
            del(id) {
                this.mute = true;
                window.axios.delete(`/admin/categories/${id}/delete`).then(() => {
                    let index = this.categories.findIndex(category => category.id === id);
                    this.categories.splice(index, 1);
                    this.mute = false;
                });
            }
        },
        watch: {
            mute(val) {
                document.getElementById('mute').className = val ? "on" : "";
            }
        },
        components: {
            CategoryComponent
        },
        created() {
            this.read();
        }
    }
</script>
<style>
    .heading h1 {
        margin-bottom: 0;
    }
</style>