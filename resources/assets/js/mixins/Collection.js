export default{
    data(){
        return {
            items: []
        };
    },
    methods: {
        add(item){
            this.items.push(item);
            this.$emit('added');
        },
        remove(index){
            this.items.splice(index, 1);
            // alert(this.items);
            // console.log(this.items);
            this.$emit('removed');
        }
    }
}