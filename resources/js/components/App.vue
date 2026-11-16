<template>
    <div v-if="article !== null" class="nes-container is-rounded is-dark"
         style="position: fixed; top: 20px; right: 20px; z-index: 9999; max-width: 400px;">

        <p>Добавлена новая статья!
            <a :href="`/article/${article.id}`">{{ article.title }}</a>
        </p>


        <button class="nes-btn is-primary" @click="article = null">
            Закрыть
        </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            article: null
        };
    },

    mounted() {
        window.Echo.channel('articles')
            .listen('.NewArticleEvent', (data) => {
                console.log(data);
                this.article = data.article;
            });
    }
};
</script>