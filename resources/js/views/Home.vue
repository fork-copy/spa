<template>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <vue-swing
                :config="config" ref="swinger"
                @throwout="throwout"
                >
                    <div class="card" v-for="card in cards" v-if="seen" style="width: 20rem;height:auto;margin-bottom: 1em;">
                        <div class="card-body text-center">
                            <h1 class="card-title text-danger">{{ card.furigana }}</h1>
                            <h4 class="text-success">{{ card.hiragana}}</h4>
                            <p>{{ card.meaning_in_english }}</p>
                            <p class="font-italic">{{ card.meaning_in_burmese }} </p>
                        </div>
                    </div>
                </vue-swing>
            </div>
        </div>
</template>

<script>
import VueSwing from 'vue-swing';

export default {
    components: {
        VueSwing
    },
    data() {
        return {
            config: {
                destroyCard: true
            },
            cards: [],
            seen: true
        };
    },
    methods: {
        throwout() {
            this.seen = true;
        }
    },
    created() {
        axios.get('/vocabularies').then(({data}) => {
            this.cards = data
        });
    }
};
</script>

