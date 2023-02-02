<template>
    <div>
         <form @submit.prevent="studentApply">
           
            <div class="alert alert-primary text-center">
                <b>আপনার পছন্দের অগ্রাধিকার অনুসারে বিষয়/বিভাগ সিলেক্ট করুন</b>
            </div>
           
            <!-- <div class="row mb-2 pt-3 mb-2">
                <div class="col col-sm-10 col-lg-8">
                    
                </div>
                
            </div> -->
            
            <div class="row mb-2 justify-content-center">
                <div class="col col-lg-10">
                    <div class="d-flex align-items-center mb-3">
                        <div class=" mr-3">বিষয়সমূহঃ</div>
                        <select v-model="currentSub" class="form-control" @change="choiceSub">
                            <option selected value="null">বিষয় পছন্দ করুন</option>
                            <option v-for="(dept, i) in new_subjects" :key="i" :value="i">{{ dept.name }}</option>
                        </select>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <!-- <div class="d-flex justify-content-between">
                                <b class="d-block mb-2 select-none">ক্রমানুসারে পছন্দকৃত বিষয়সমূহঃ</b>
                                <span class="text-danger select-none" v-if="form.choiceSubs.length">পছন্দ বাতিল করতে ক্রস করুন</span>
                            </div>
                            <ul>
                                <li v-for="(dept,i) in form.choiceSubs" :key="i" class="d-flex justify-content-between mb-2">
                                    <span>{{ enToBn(i) }}. {{ dept.name }}</span>
                                    <span class="btn btn-sm" @click="removeChoice(i)"> &#10060 </span>
                                </li>
                            </ul> -->
                            <table class="text-center w-100">
                                <thead>
                                    <th class="" style="width: 20%">পছন্দক্রম</th>
                                    <th class="text-left">বিষয়/বিভাগ</th>
                                    <td><small class="text-danger select-none" v-if="form.choiceSubs.length">পছন্দ বাতিল করতে ক্রস করুন</small></td>
                                    
                                </thead>
                                <tbody>
                                    <tr v-for="(dept,i) in form.choiceSubs" :key="i">
                                        <td>{{ enToBn(i) }}</td>
                                        <td class="text-left">{{ dept.name }}</td>
                                        <td><span class="btn btn-sm" @click="removeChoice(i)"> &#10060 </span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-2">
                        <div>
                            <ul style="list-style-type: disc; list-style-position: inside;" class="text-info">
                                <li>আবেদনের শেষ তারিখ পর্যন্ত আপনার পছন্দক্রম পরিবর্তন করতে পারবেন।</li>
                                <li>পছন্দক্রম পরিবর্তনের জন্য আপনার প্রোফাইলের <span class="btn btn-danger btn-sm disabled"><i class="fas fa-edit"></i> Edit Subject Choice</span> বাটনে ক্লিক করতে হবে।</li>
                                
                            </ul>
                        </div>
                    </div>

                    <div class="d-flex mt-3">
                        <div class="mr-3"><span>কোটা (যদি থাকে):</span></div>
                        <!-- <select class="form-control" v-model="form.quota">
                            <option value="NA">প্রযোজ্য নয়</option>
                            <option value="FFQ">মুক্তিযোদ্ধা কোটা</option>
                            <option value="TQ">উপজাতি কোটা</option>
                            <option value="PDQ">প্রতিবন্ধী কোটা (বাক, শ্রবণ, দৃষ্টি)</option>
                            <option value="CPQ">খেলোয়াড় কোটা</option>
                            <option value="HQ">হরিজন/দলিত কোটা</option>
                            <option value="WQ">পোষ্য কোটা</option>
                        </select> -->
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
             
            
            <div class="d-flex justify-content-center">
               <div>
                   <ul style="list-style-type: disc; list-style-position: inside;" class="text-danger">
                       <li>এখন কোটা পছন্দ না দিলে, পরবর্তীতে কোটা প্রযোজ্য হবে না।</li>
                       <li>কোটা পছন্দ দিলে, ভর্তির সময় অবশ্যই সংশ্লিষ্ট কাগজপত্র জমা দিতে হবে।</li>
                   </ul>
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
        props: ['sub_choice', 'applied_unit','new_depts', 'token', 'quota'],
        created() {
            this.form.choiceSubs = JSON.parse(JSON.stringify(this.sub_choice));
            this.new_subjects = JSON.parse(JSON.stringify(this.new_depts));
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
            choiceSub() {
                if(this.currentSub != "null") {
                    this.form.choiceSubs.push(this.new_subjects[this.currentSub]);
                    this.new_subjects.splice(this.currentSub, 1);
                    this.currentSub = "null";
                }
                
            },
            removeChoice(index) {
                this.new_subjects.push(this.form.choiceSubs[index]);
                this.form.choiceSubs.splice(index, 1);
            },
            studentApply() {
                if(this.form.choiceSubs.length == 0) {
                    Swal.fire({
                        html: '<h4 class="pt-3">বিষয় পছন্দ করুন</h4>',
                        confirmButtonText: 'Close'
                    })
                } else if(this.new_subjects.length) {
                    Swal.fire({
                        html: '<h4 class="pt-3">সবগুলো বিষয় পছন্দ করুন</h4>',
                        confirmButtonText: 'Close'
                    })
                } else {
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
                }

                
               
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
                    };
               return numbersE[en+1];
            },
        },
    }
</script>
