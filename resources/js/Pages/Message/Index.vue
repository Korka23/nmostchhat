<template>
    <div class="w-1/2 mx-auto py-6">
        <div v-if="messages.length" class="mb-4">
            <h3>Messages</h3>
            <div>
                <div v-for="message in messages">
                    <p>{{ message.id}}</p>
                    <p>{{ message.body}}</p>
                    <p>{{message.time}}</p>
                </div>
            </div>
        </div>
        <div>
            <div class="mb-4">
                <input type="text" placeholder="your message">
            </div>
            <div class="mb-4">
                <a @click.prevent="store" href="#" class="rounded-lg block w-48 bg-sky-400 text-white text-center py-2">Send</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Index",
    props: [
        'messages'
    ],
    data(){
        return{
            body:''
        }
    },
    methods:{
        store(){
            axios.post('/messages', {body: this.body})
                .then( res => {
                    this.messages.unshift(res.data)
                })
        }
    }
}
</script>

<style scoped>

</style>
