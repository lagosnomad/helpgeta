const paystackMixin = {
    data(){
        return {
            paystackkey: "pk_test_9acc2b809ccde5e4cce9c52d3ea1a60efb0839fc",
        }
    },
    computed: {
        scriptLoaded: function() {
            return new Promise((resolve) => {
                this.loadScript(() => {
                    resolve()
                })
            })
        },
        reference(){
            let text = "";
            let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for( let i=0; i < 10; i++ )
                text += possible.charAt(Math.floor(Math.random() * possible.length));

            return text;
        },
    },
    methods: {
        loadScript(callback) {
            const script = document.createElement('script')
            script.src = 'https://js.paystack.co/v1/inline.js'
            document.getElementsByTagName('head')[0].appendChild(script)
            if (script.readyState) {  // IE
                script.onreadystatechange = () => {
                    if (script.readyState === 'loaded' || script.readyState === 'complete') {
                        script.onreadystatechange = null
                        callback()
                    }
                }
            } else {  // Others
                script.onload = () => {
                    callback()
                }
            }
        },
        payWithPaystack() {
            this.scriptLoaded.then(() => {
                const paystackOptions = {
                    key: this.paystackkey,
                    email: this.email,
                    amount: this.amount,
                    ref: this.reference,
                    callback: (response) => {
                        this.callback(response)
                    },
                    onClose: () => {
                        this.close()
                    },
                    metadata: this.metadata
                }
                const handler = window.PaystackPop.setup(paystackOptions)
                handler.openIframe()
            })
        },
    }
}
export default paystackMixin