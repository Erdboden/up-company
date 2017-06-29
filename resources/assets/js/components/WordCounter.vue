<template>
    <div class="row">
        <div class="control">
            <button class="btn btn-default" @click="clear"><span class="glyphicon glyphicon-trash"></span></button>
            <textarea class="form-control count-area" rows="10" v-model="body"></textarea>
            <!--<div class="grippie" style="margin-right: 0px;" @mousedown="resize"></div>-->
            <div>Characters: <label v-text="charCount"></label></div>
            <div>Words: <label v-text="wordCount"></label></div>
            <div>Sentences: <label v-text="sentenceCount"></label></div>
            <div>Paragraphs: <label v-text="paragraphCount"></label></div>
        </div>
    </div>
</template>
<script>
    export default{

        data(){
            return {
                body: '',
                wordCount: 0,
                charCount: 0,
                sentenceCount: 0,
                paragraphCount: 0,
                helper: ''

            }
        },
        watch: {
            body: function () {
                this.count();
            }
        },
        methods: {
            count(){
                if (this.body === '') {
                    this.wordCount = 0;
                    this.charCount = 0;
                    this.sentenceCount = 0;
                    this.paragraphCount = 0;
                } else {
                    let wordRegex = /\s+/gi;
                    let sentenceRegex = /[.|!|?]\s/gi;
                    this.wordCount = this.body.trim().split(wordRegex).length;
                    this.sentenceCount = this.body.split(sentenceRegex).length;
                    this.helper = this.body.split('\n');
                    let noParagraphs = 0;
                    this.helper.forEach(function (element) {
                        if (!(element == '')) {
                            noParagraphs += 1;

                        }
                    });
                    this.paragraphCount = noParagraphs;
                    this.charCount = this.body.length;
                }
            },
            clear(){
                this.body = '';
                this.count();
            }
        },

    }
</script>
<style>
    .count-area {
        resize: vertical;
        /*height: auto;*/
    }

    div.grippie {
        background: #EEEEEE url(https://s0.2mdn.net/5585042/728x90ps_2016_3_.png) no-repeat scroll center 2px;
        border-color: #DDDDDD;
        border-style: solid;
        border-width: 0pt 1px 1px;
        cursor: s-resize;
        height: 50px;
        overflow: hidden;
    }
</style>