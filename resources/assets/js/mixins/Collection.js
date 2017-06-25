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
            alert(index);
            this.items.splice(index, 1);
            // alert(this.items);
            // console.log(this.items);
            this.$emit('removed');
        }
    }
}