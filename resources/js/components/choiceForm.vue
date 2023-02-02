<template>
    <div>
         <form @submit.prevent="studentApply">

            <div class="alert alert-primary">
                <ul style="list-style-type: disc; list-style-position: inside;" class="text-info">
                    <li>বিষয়/বিভাগ এর পাশের <span class="btn text-success" style="font-size: 1.2rem;"> <i class="far fa-arrow-alt-circle-up"></i> </span> এবং <span class="btn text-primary" style="font-size: 1.2rem;"><i class="far fa-arrow-alt-circle-down"></i> </span> বাটনে ক্লিক করে আপনার পছন্দক্রম পরিবর্তন করুন।</li>
                    <li>আবেদনের শেষ তারিখ পর্যন্ত আপনার পছন্দক্রম পরিবর্তন করতে পারবেন। এর পরবর্তীতে আর কোনভাবেই পছন্দক্রম পরিবর্তন করা যাবে না।</li>
                    <li>পছন্দক্রম পরিবর্তনের জন্য আপনার প্রোফাইলের <span class="btn btn-danger btn-sm disabled"><i class="fas fa-edit"></i> Edit Subject Choice</span> বাটনে ক্লিক করতে হবে।</li>
                </ul>
            </div>

            <!-- <div class="row mb-2 pt-3 mb-2">
                <div class="col col-sm-10 col-lg-8">

                </div>

            </div> -->

            <div class="row mb-2 justify-content-center">
                <div class="col col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="text-center w-100">
                                    <thead>
                                        <th class="" style="width: 20%">পছন্দক্রম</th>
                                        <th class="text-left">বিষয়/বিভাগ</th>
                                        <th colspan="2">পছন্দক্রম পরিবর্তন</th>

                                    </thead>
                                    <tbody>
                                        <tr v-for="(dept,i) in form.choiceSubs" :key="i" class="border-bottom">
                                            <td>{{ enToBn(i) }}</td>
                                            <td class="text-left">{{ dept.name }}</td>
                                            <td><span class="btn text-success" style="font-size: 1.2rem;" @click="upChoice(i)" v-if="(i>0 && (dept.id>30 && dept.id<34))"> <i class="far fa-arrow-alt-circle-up"></i> </span></td>
                                            <td><span class="btn text-primary" style="font-size: 1.2rem;" @click="downChoice(i)" v-if="(i<form.choiceSubs.length-1  && (dept.id>30 && dept.id<34))"><i class="far fa-arrow-alt-circle-down"></i> </span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-primary d-flex justify-content-center mt-3">
                        <ul style="list-style-type: disc; list-style-position: inside;" class="text-danger mb-0">
                            <li>এখন কোটা পছন্দ না দিলে, পরবর্তীতে কোটা প্রযোজ্য হবে না।</li>
                            <li>কোটা পছন্দ দিলে, ভর্তির সময় অবশ্যই সংশ্লিষ্ট কাগজপত্র জমা দিতে হবে।</li>
                        </ul>
                    </div>

                    <div class="d-flex">
                        <div class="mr-3"><span>কোটা (যদি থাকে):</span></div>
                        <div>
                            <input type="checkbox" id="FFQ" name="FFQ" value="FFQ" v-model="form.quota">
                            <label for="FFQ">মুক্তিযোদ্ধা কোটা</label><br>
                            <input type="checkbox" id="TQ" name="TQ" value="TQ" v-model="form.quota">
                            <label for="TQ">উপজাতি কোটা</label><br>
                            <input type="checkbox" id="PDQ" name="PDQ" value="PDQ" v-model="form.quota">
                            <label for="PDQ">প্রতিবন্ধী কোটা (বাক, শ্রবণ, দৃষ্টি)</label><br>
                            <input type="checkbox" id="CPQ" name="CPQ" value="CPQ" v-model="form.quota">
                            <label for="CPQ">খেলোয়াড় কোটা</label><br>
                            <input type="checkbox" id="HQ" name="HQ" value="HQ" v-model="form.quota">
                            <label for="HQ">হরিজন/দলিত কোটা</label><br>
                            <input type="checkbox" id="WQ" name="WQ" value="WQ" v-model="form.quota">
                            <label for="WQ">পোষ্য কোটা</label><br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center pt-4">
                <div class="col-10 col-lg-6 text-right">
                <a href="/student/profile" class="btn btn-danger mr-2 border"><i class="fa fa-angle-left" aria-hidden="true"></i> ফিরে চলুন</a>
                <!-- <input type="submit" class="btn btn-primary" value="সাবমিট"> -->
                <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> সাবমিট</button>

                </div>
            </div>

        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                currentSub: null,
                new_subjects: null,
                form: {
                    choiceSubs: [],
                    quota: [],
                    units: null,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                }
            }
        },
        props: ['sub_choice', 'applied_unit', 'quota'],
        created() {
            this.form.choiceSubs = JSON.parse(JSON.stringify(this.sub_choice));
            this.form.units = JSON.parse(JSON.stringify(this.applied_unit));
            this.form.quota = JSON.parse(JSON.stringify(this.quota));
        },
        methods: {
            dept_name(code) {
                this.subjects.forEach(element => {
                    if(element.id == code) {
                        return element.ename;
                    }
                });
            },
            upChoice(index) {
                if(index>0) {
                    var element = this.form.choiceSubs[index];
                    this.form.choiceSubs.splice(index, 1);
                    this.form.choiceSubs.splice(index-1, 0, element);
                }
            },
            downChoice(index) {
                if(index<this.form.choiceSubs.length-1) {
                    var element = this.form.choiceSubs[index];
                    this.form.choiceSubs.splice(index, 1);
                    this.form.choiceSubs.splice(index+1, 0, element);
                }
            },
            studentApply() {
                let subList = '<h4 class="py-3"><b>আপনার বিষয় পছন্দক্রম ও কোটা নিশ্চিত করুন</b></h4><ul class="text-left">';
                this.form.choiceSubs.forEach((element,i) => {
                    subList += '<li class=""><span>(';
                    subList += this.enToBn(i) + ') ' + element.name;
                    subList += '</span></li>';
                });

                subList += `</ul><p class="text-left">কোটাঃ ${this.getQuotaString(this.form.quota)}</p><p class="text-danger"></p>`;

                Swal.fire({
                    html: subList,
                    showCancelButton: true,
                    customClass: 'w-75 w-md-50',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'ফিরে চলুন',
                    confirmButtonText: 'নিশ্চিত'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        axios.post('/student/apply', this.form)
                        .then(res => {
                            if(res.status == 200) {
                                //console.log(res.data);
                                let url = window.location.href;
                                url = url.slice(0, url.lastIndexOf("/"));
                                url = url.slice(0, url.lastIndexOf("/"));
                                window.location.replace(url+'/choice/list');
                            }
                        })
                        .catch(err => {
                            Swal.fire({
                                icon: 'error',
                                title: err.response.data.message,
                                confirmButtonText: 'Close'
                            })
                        })
                    }
                })
            },
            getQuotaString(quotas) {
                if(quotas.length==0) {
                    return "প্রযোজ্য নয়";
                } else {
                    var quotabn = [];
                    quotas.forEach(element => {
                        quotabn.push(this.getQuotaName(element));
                    })
                    return quotabn.toString();
                }
            },
            getQuotaName(quota) {
                if (quota == "NA")
                    return "প্রযোজ্য নয়";
                else if(quota == "FFQ")
                    return "মুক্তিযোদ্ধা কোটা";
                else if(quota == "PDQ")
                    return "প্রতিবন্ধী কোটা";
                else if(quota == "TQ")
                    return "উপজাতি কোটা";
                else if(quota == "CPQ")
                    return "খেলোয়াড় কোটা";
                else if(quota == "WQ")
                    return "পোষ্য কোটা";
                else if(quota == "HQ")
                    return "হরিজন/দলিত কোটা";
            },
            enToBn(en) {
                var numbersE = {
                        0:'০',
                        1:'১',
                        2:'২',
                        3:'৩',
                        4:'৪',
                        5:'৫',
                        6:'৬',
                        7:'৭',
                        8:'৮',
                        9:'৯',
                        10:'১০',
                        11:'১১',
                        12:'১২',
                        13:'১৩',
                        14:'১৪',
                        15:'১৫',
                        16:'১৬',
                        17:'১৭',
                        18:'১৮',
                        19:'১৯',
                        20:'২০',
                        21:'২১',
                        22:'২২',
                        23:'২৩',
                        24:'২৪',
                        25:'২৫',
                        26:'২৬',
                        27:'২৭',
                        28:'২৮',
                        29:'২৯',
                        30:'৩০',
                        31:'৩১',
                        32:'৩২',
                        33:'৩৩',
                    };
               return numbersE[en+1];
            },
        },
    }
</script>
