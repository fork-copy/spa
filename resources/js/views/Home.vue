<template>
    <div class="top-card">

        <div class="stack-wrapper">
            <stack ref="stack" :pages="cards" :stackinit="stackinit"></stack>
        </div>

        <div class="controls">
            <button @click="prev" class="button"><i class="prev"></i><span class="text-hidden">prev</span></button>
            <button @click="next" class="button"><i class="next"></i><span class="text-hidden">next</span></button>
        </div>
    </div>
</template>

<script>
    import stack from 'vue-tantan-stack'

    export default {
        data() {
            return {
                cards: [],
                stackinit: {
                    visible: 3
                }
            }
        },
        created() {
            axios.get('/getVocabularies').then(({data}) => {
                //this.cards = data;
                var cardLength = data.length;
                var myCard = [];
                for (var i = 0; i < cardLength; i++) {
                    myCard[i] = {
                        html: '<div class="card max-w-sm rounded overflow-hidden shadow-md"><div class="px-6 py-4 card-body"><div class="font-bold text-4xl text-center text-red-dark mb-2 leading-normal">' + data[i]['furigana'] + '</div><div class="font-bold text-green text-2xl mb-2  leading-tight">'+ data[i]['hiragana']+'</div><p class="text-xl">'+ data[i]['romaji']+'</p><p class="font-italic text-lg">'+data[i]['meaning_in_english']+'</p><p class="font-italic text-lg">'+ data[i]['meaning_in_burmese'] +'</p></div></div>'
                    };
                }
                this.cards = myCard;
            });
        },

        components: {
            stack
        },
        methods: {
            prev() {
                console.log("user click previous icon");
                this.$refs.stack.$emit('prev')
            },
            next() {
                console.log("user click next icon");
                this.$refs.stack.$emit('next')
            }
        }
    }
</script>
<style>
    .stack-wrapper {
        position: relative;
        z-index: 1000;
        width: 90%;
        height: 320px;
        list-style: none;
        pointer-events: none;
        margin: 0 auto;
    }

    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 10rem;
        min-height: 15rem;
        word-wrap: break-word;
        background-clip: border-box;
        border-radius: 0.25rem;
        border: 0 solid #dae1e7;
        background: #E0EAFC;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #CFDEF3, #E0EAFC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

    #app > div > div > div.stack-wrapper > ul > li:nth-child(3) > div > div > div {
        width: auto;
    }

    #app > div > div > div.stack-wrapper > ul > li:nth-child(3) > div > div > div {
        padding: 0;
    }

    .card-body {
        padding: 1.25rem;
    }

    .controls {
        position: relative;
        width: 200px;
        text-align: center;
        display: flex; /*Flex布局*/
        display: -webkit-flex; /* Safari */
        justify-content: space-around;
        margin: 0 auto;
    }

    .controls .button {
        border: none;
        background: none;
        position: relative;
        display: inline-block;
        cursor: pointer;
        font-size: 16px;
        width: 50px;
        height: 50px;
        z-index: 100;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        border-radius: 50%;
        background: #fff;
    }

    .button .next {
        display: inline-block;
        width: 10px;
        height: 5px;
        background: rgb(129, 212, 125);
        line-height: 0;
        font-size: 0;
        vertical-align: middle;
        -webkit-transform: rotate(45deg);
        left: -5px;
        top: 2px;
        position: relative;
    }

    .button .next:after {
        content: '/';
        display: block;
        width: 20px;
        height: 5px;
        background: rgb(129, 212, 125);
        -webkit-transform: rotate(-90deg) translateY(-50%) translateX(50%);
    }

    .button .prev {
        display: inline-block;
        width: 20px;
        height: 5px;
        background: rgb(230, 104, 104);
        line-height: 0;
        font-size: 0;
        vertical-align: middle;
        -webkit-transform: rotate(45deg);
    }

    .button .prev:after {
        content: '/';
        display: block;
        width: 20px;
        height: 5px;
        background: rgb(230, 104, 104);
        -webkit-transform: rotate(-90deg);
    }

    .controls .text-hidden {
        position: absolute;
        overflow: hidden;
        width: 0;
        height: 0;
        color: transparent;
        display: block;
    }

    p {
        line-height: 2.5rem;
    }
</style>





