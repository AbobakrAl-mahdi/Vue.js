const app = Vue.createApp({
    data() {
        return{
            show : false,
            fach: 'Mathe1',
            student :'Abobakr Al-mahdi',
            note : 50
        }
    },
    methods: {
        toogleShowBooks(){
            this.show = !this.show
        },
        changeFach(){
            this.fach='Mathe2',
            this.note=55
        }
    }
})

 app.mount('#app')