<template>

</template>

<script>
export default {
    props:["contents"],
    data(){
        return{
            quill: ''
        }
    },
    mounted() {
        this.quill = new Quill(this.$el.lastChild, {
            modules: {
                toolbar: this.$el.firstChild
            },
            placeholder: 'Enter your product description',
            theme: 'snow'
        });

        this.quill.setText(this.contents);

    }
}
</script>
