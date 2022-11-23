@extends(backpack_view('blank'))

@php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    $crud->entity_name_plural => url($crud->route),
    trans('backpack::crud.list') => false,
  ];

  // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
  <div class="container-fluid">
    <h2>
      <span class="text-capitalize">{!! $crud->getHeading() ?? $crud->entity_name_plural !!}</span>
      <small id="datatable_info_stack">{!! $crud->getSubheading() ?? '' !!}</small>
    </h2>
  </div>
@endsection
<div id="app">
    <div ref="app" style="visibility: hidden;">
        <div class="modal fade" id="orderCardModal" tabindex="-1" role="dialog" aria-labelledby="orderCardModal" aria-hidden="true" @mouseup.stop="hardReset">
            <div class="modal-dialog modal-lg" role="document" @mouseup.stop>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><i class="las la-cloud-upload-alt"></i> Импорт карт из Excel</h5>
                        <button type="button" class="close" data-dismiss="modal" @mouseup.stop="hardReset">
                            <span aria-hidden="true" >&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-4">
                            <div class="d-flex justify-content-center align-items-center" style="gap: 15px;">
                                <div class="p-2 step-items" :class="{ 'bg-light': firstStep,  border: firstStep, 'text-primary': firstStep, 'text-secondary': !firstStep}">
                                    <div class="d-flex align-items-center font-weight-bold">
                                        <button class="rounded-circle border-0 text-white" style="width: 40px; height:40px;font-size: 14px;" :class="{'bg-primary': firstStep, 'bg-secondary': !firstStep}">1</button>
                                        <div>
                                            <div>Шаг 1</div>
                                            <div class="font-weight-normal text-muted">Загрузка карт</div>
                                        </div>
                                    </div>
                                </div>
                                <i class="las la-angle-right text-secondary" style="font-size: 20px;color: grey;"></i>
                                <div class="p-2 step-items" :class="{ 'bg-light': secondStep,  border: secondStep, 'text-primary': secondStep, 'text-secondary': !secondStep}">
                                    <div class="d-flex align-items-center font-weight-bold">
                                        <button class="rounded-circle border-0 text-white" style="width: 40px; height:40px;font-size: 14px;" :class="{'bg-primary': secondStep, 'bg-secondary': !secondStep}">2</button>
                                        <div>
                                            <div>Шаг 2</div>
                                            <div class="font-weight-normal text-muted">Обработка карт</div>
                                        </div>
                                    </div>
                                </div>
                                <i class="las la-angle-right text-secondary" style="font-size: 20px;color: grey;"></i>
                                <div class="p-2 step-items" :class="{ 'bg-light': thirdStep,  border: thirdStep, 'text-primary': thirdStep, 'text-secondary': !thirdStep}">
                                    <div class="d-flex align-items-center font-weight-bold">
                                        <button class="rounded-circle border-0 text-white" style="width: 40px; height:40px;font-size: 14px;" :class="{'bg-primary': thirdStep, 'bg-secondary': !thirdStep}">3</button>
                                        <div>
                                            <div>Шаг 3</div>
                                            <div class="font-weight-normal text-muted">Завершение</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <template v-if="firstStep">
                            <div class="mt-5 mx-5">
                                <h3 style="font-weight: 600;">Загрузка карт</h3>
                                <p class="text-muted my-2">Прежде чем загружать файл просим проверить все ли поля соответствуют порядку и правилам.</p>
                                <ul class="list-group list-group-flush" :class="{'text-primary':!error,'text-danger':error}">
                                    <li class="list-group-item border-0 px-0" :class="{'error-item':error}">
                                        <i class="las la-angle-right"></i>
                                        Документ не должен превышать 10 мегабайт
                                    </li>
                                    <li class="list-group-item border-0 px-0" :class="{'error-item':error}">
                                        <i class="las la-angle-right"></i>
                                        Документ должен быть в формате MS Excel
                                    </li>
                                    <li class="list-group-item border-0 px-0" :class="{'error-item':error}">
                                        <i class="las la-angle-right"></i>
                                        <span style="border-bottom: 1px dotted; cursor: pointer;" @click="tableShow = !tableShow">Порядок столбцов построена правильно <i class="las la-question-circle"></i></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="my-5" v-if="!uploading">
                                <div class="d-flex justify-content-center">
                                    <input type="file" class="d-none" ref="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" @change="startUpload">
                                    <button type="button" class="btn btn-primary" @click="$refs.file.click()"><i class="las la-cloud-upload-alt"></i> Выбрать файл</button>
                                </div>
                            </div>
                            <div class="my-5" v-else>
                                <div class="d-flex justify-content-center flex-column align-items-center">
                                    <div class="indicator bg-light overflow-hidden rounded">
                                        <div class="bg-primary" :style="{'width' : uploadPercentage + '%'}"></div>
                                    </div>
                                    <div class="text-danger mt-2">Не закрывайте окно идет загрузка</div>
                                </div>
                            </div>
                            <div class="list-group-info my-5 mx-5" v-show="tableShow">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(cell,key) in table" :key="key">
                                        <th scope="row" class="text-primary">@{{cell.key}}</th>
                                        <td class="pl-2 text-muted">@{{cell.value}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </template>
                        <template v-else-if="secondStep">
                            <div class="mt-5 mx-5 ">
                                <h3 style="font-weight: 600;">Обработка карт</h3>
                                <p class="text-muted my-2" v-show="!processing">Убедитесь что все данные заполнены правильно.</p>
                            </div>
                            <div class="mt-5 max-5 d-flex justify-content-center align-items-center" v-if="processing" style="gap: 20px;">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="lds-roller">
                                        <div class="bg-primary"></div>
                                        <div class="bg-primary"></div>
                                        <div class="bg-primary"></div>
                                        <div class="bg-primary"></div>
                                        <div class="bg-primary"></div>
                                        <div class="bg-primary"></div>
                                        <div class="bg-primary"></div>
                                        <div class="bg-primary"></div>
                                    </div>
                                </div>
                                <div class="text-primary mt-2 text-center h4">Пожалуйста, не закрывайте окно!</div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center my-5 text-center" style="gap: 40px">
                                <div class="text-primary">
                                    <div>Обработано</div>
                                    <div class=" h4">@{{ list.length }}</div>
                                </div>
                                <div class="text-success">
                                    <div>Успешных</div>
                                    <div class=" h4">@{{ success }}</div>
                                </div>
                                <div class="text-danger">
                                    <div>Неудачных</div>
                                    <div class=" h4">@{{ failure }}</div>
                                </div>
                            </div>
                            <template v-if="!processing">
                                <div class="d-flex justify-content-center my-5 text-center" style="gap: 20px">
                                    <div>
                                        <button type="button" class="btn btn-danger" v-if="failure > 0" @click="downloadFailure">Скопировать таблицу неудачных</button>
                                        <div class="text-secondary" v-show="failureText">Скопировано</div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-success" v-if="success > 0" @click="startThirdStep">Импортировать успешных</button>
                                        <button type="button" class="btn btn-warning text-white" @click="hardReset" v-else>Вернуться назад</button>
                                    </div>
                                </div>
                                <div class="list-group-info my-5 mx-5 overflow-auto">
                                    <h4 class="text-center">Таблица неудачных карт</h4>
                                    <table class="table table-sm table-striped table-bordered" style="font-size: 11px;" ref="failureTable">
                                        <thead>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-nowrap">Дата активации</th>
                                            <td class="text-nowrap">Срок действия</td>
                                            <td class="text-nowrap">№ присвоенной карты</td>
                                            <td class="text-nowrap">Город</td>
                                            <td class="text-nowrap">Тип карты</td>
                                            <td class="text-nowrap">Статус карты</td>
                                            <td class="text-nowrap">Фамилия Владельца 1</td>
                                            <td class="text-nowrap">Имя Владельца 1</td>
                                            <td class="text-nowrap">Отчество Владельца 1</td>
                                            <td class="text-nowrap">День рождения Владельца 1</td>
                                            <td class="text-nowrap">Пол Владельца 1</td>
                                            <td class="text-nowrap">Марка Владельца 1</td>
                                            <td class="text-nowrap">Модель Владельца 1</td>
                                            <td class="text-nowrap">Год выпуска Владельца 1</td>
                                            <td class="text-nowrap">Гос. Номер* Владельца 1</td>
                                            <td class="text-nowrap">Vin code Владельца 1</td>
                                            <td class="text-nowrap">Телефон Владельца 1</td>
                                            <td class="text-nowrap">Email Владельца 1</td>
                                            <td class="text-nowrap">Фамилия Владельца 2</td>
                                            <td class="text-nowrap">Имя Владельца 2</td>
                                            <td class="text-nowrap">Отчество Владельца 2</td>
                                            <td class="text-nowrap">День рождения Владельца 2</td>
                                            <td class="text-nowrap">Пол Владельца 2</td>
                                            <td class="text-nowrap">Марка Владельца 2</td>
                                            <td class="text-nowrap">Модель Владельца 2</td>
                                            <td class="text-nowrap">Год выпуска Владельца 2</td>
                                            <td class="text-nowrap">Гос. Номер* Владельца 2</td>
                                            <td class="text-nowrap">Vin code Владельца 2</td>
                                            <td class="text-nowrap">Телефон Владельца 2</td>
                                            <td class="text-nowrap">Email Владельца 2</td>
                                            <td class="text-nowrap">Создать учетную запись в приложении (да/нет)**</td>
                                        </tr>
                                        <tr v-for="(row,key) in failureList" :key="key">
                                            <td class="text-nowrap" v-for="(cell,cellKey) in row" :key="cellKey" :class="{'bg-danger':Array.isArray(cell)}">
                                                <template v-if="Array.isArray(cell)"><u><strong>@{{ cell[0] }}</strong></u></template>
                                                <template v-else>@{{ cell }}</template>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </template>
                        </template>
                        <template v-else-if="thirdStep">
                            <div class="mt-5 mx-5">
                                <h3 style="font-weight: 600;">Завершение</h3>
                                <p class="text-muted my-2">Пожалуйста, не закрывайте модальное окно пока загрузка карт не закончиться.</p>
                                <p class="text-success my-2">@{{success}} карт были успешно загружены. Скоро все карты появится в админке.</p>
                            </div>
                            <div class="d-flex justify-content-center my-5 text-center">
                                <button type="button" class="btn btn-success" @click="hardReset">Завершить импорт карт</button>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="orderCardModalAnalytics" tabindex="-1" role="dialog" aria-labelledby="orderCardModalAnalytics" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><i class="las la-cloud-upload-alt"></i> Аналитика</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true" >&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ \App\Domain\Contracts\Contract::T(\App\Domain\Contracts\Contract::START_DATE) }}</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{ \App\Domain\Contracts\Contract::T(\App\Domain\Contracts\Contract::END_DATE) }}</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{ \App\Domain\Contracts\Contract::T(\App\Domain\Contracts\Contract::UTM_CAMPAIGN) }}</label>
                                <input type="text" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-info w-100">Экспорт</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    Pusher.logToConsole = true;

    const pusher = new Pusher('6eb96162a3a95317dacc', {
        cluster: 'ap2'
    });

    const channel = pusher.subscribe('order-card');

    const { createApp } = Vue

    createApp({
        data() {
            return {
                main: true,
                failureText: false,
                time: null,
                step: 1,
                error: false,
                uploading: false,
                uploadPercentage: 0,
                tableShow: false,
                processing: true,
                list: [],
                table: [
                    {key: 'A',value: 'Дата активации'},
                    {key: 'B',value: 'Срок действия'},
                    {key: 'C',value: '№ присвоенной карты'},
                    {key: 'D',value: 'Город'},
                    {key: 'E',value: 'Тип карты'},
                    {key: 'F',value: 'Статус карты'},
                    {key: 'G',value: 'Фамилия Владельца 1'},
                    {key: 'H',value: 'Имя Владельца 1'},
                    {key: 'I',value: 'Отчество Владельца 1'},
                    {key: 'J',value: 'День рождения Владельца 1'},
                    {key: 'K',value: 'Пол Владельца 1'},
                    {key: 'L',value: 'Марка Владельца 1'},
                    {key: 'M',value: 'Модель Владельца 1'},
                    {key: 'N',value: 'Год выпуска Владельца 1'},
                    {key: 'O',value: 'Гос. Номер* Владельца 1'},
                    {key: 'P',value: 'Vin code Владельца 1'},
                    {key: 'Q',value: 'Телефон Владельца 1'},
                    {key: 'R',value: 'Email Владельца 1'},
                    {key: 'S',value: 'Фамилия Владельца 2'},
                    {key: 'T',value: 'Имя Владельца 2'},
                    {key: 'U',value: 'Отчество Владельца 2'},
                    {key: 'V',value: 'День рождения Владельца 2'},
                    {key: 'W',value: 'Пол Владельца 2'},
                    {key: 'X',value: 'Марка Владельца 2'},
                    {key: 'Y',value: 'Модель Владельца 2'},
                    {key: 'Z',value: 'Год выпуска Владельца 2'},
                    {key: 'AA',value: 'Гос. Номер* Владельца 2'},
                    {key: 'AB',value: 'Vin code Владельца 2'},
                    {key: 'AC',value: 'Телефон Владельца 2'},
                    {key: 'AD',value: 'Email Владельца 2'},
                    {key: 'AE',value: 'Создать учетную запись в приложении (да/нет)**'},
                ],
                file: null,
            }
        },
        computed: {
            firstStep() {
                return (this.step === 1);
            },
            secondStep() {
                return (this.step === 2);
            },
            thirdStep() {
                return (this.step === 3);
            },
            success() {
                let count   =   0;
                this.list.filter((row) => {
                    let status  =   true;
                    row.filter((item) => {
                       if (Array.isArray(item)) {
                           status   =   false;
                       }
                    });
                    if (status) {
                        count++;
                    }
                });
                return count;
            },
            failure() {
                let count   =   0;
                this.list.filter((row) => {
                    let status  =   true;
                    row.filter((item) => {
                        if (Array.isArray(item)) {
                            status   =   false;
                        }
                    });
                    if (!status) {
                        count++;
                    }
                });
                return count;
            },
            failureList() {
                let list    =   [];
                this.list.filter((row) => {
                    let status  =   true;
                    row.filter((item) => {
                        if (Array.isArray(item)) {
                            status   =   false;
                        }
                    });
                    if (!status) {
                        list.push(row);
                    }
                });
                return list;
            },
            successList() {
                let list    =   [];
                this.list.filter((row) => {
                    let status  =   true;
                    row.filter((item) => {
                        if (Array.isArray(item)) {
                            status   =   false;
                        }
                    });
                    if (status) {
                        list.push(row);
                    }
                });
                return list;
            }
        },
        mounted() {
            channel.bind('processing', (data) => {
                let message =   JSON.parse(data.message);
                if (this.processing && parseInt(message.time) === this.time) {
                    this.list   =   this.list.concat(message.data);
                    if (message.data.length !== 10 || (message.size === message.count)) {
                        this.processing =   false;
                        this.time   =   null;
                    } else if (message.data.length === 0) {
                        this.hardReset();
                    }
                }
            });
            this.$refs['app'].removeAttribute('style');
        },
        methods: {
            startThirdStep() {
                this.step   =   3;
                const data  =   { data: this.successList };
                axios.post('/api/orderCard/saveExcel', data)
                .then((response) => {

                })
                .catch((error) => {
                    this.reset(false, 0);
                });
            },
            downloadFailure() {
                let table   =   this.$refs.failureTable;
                const range = document.createRange();
                range.selectNode(table);
                window.getSelection().addRange(range);
                document.execCommand('copy');
                this.failureText    =   true;
                setTimeout(() => {
                    this.failureText    =   false;
                },2000)
            },
            checkUpload() {
                if (!this.file) {
                    return false;
                }
                return this.file.size <= 104857600;
            },
            hardReset() {
                this.file   =   null;
                this.processing =   true;
                this.list   =   [];
                this.error  =   false;
                this.uploading  =   false;
                this.uploadPercentage   =   0;
                this.time   =   null;
                this.step   =   1;
                this.tableShow  =   false;
            },
            reset(uploading = false, uploadPercentage = 0) {
                if (!uploading) {
                    this.file   =   null;
                } else {
                    this.time   =   null;
                    this.processing =   true;
                    this.list   =   [];
                }
                this.error  =   false;
                this.uploading  =   uploading;
                this.uploadPercentage   =   uploadPercentage;
            },
            startUpload() {
                this.file   =   this.$refs.file.files[0];
                if (this.checkUpload()) {
                    this.reset(true, 0);
                    const formData  =   new FormData();
                    formData.append('file', this.file);
                    const date  =   new Date();
                    this.time   =   date.getTime();
                    formData.append('time', this.time);
                    axios.post('/api/orderCard/uploadExcel', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        },
                        onUploadProgress: function(progressEvent) {
                            this.uploadPercentage = parseInt(Math.round( ( progressEvent.loaded / progressEvent.total ) * 100 ));
                        }.bind(this)
                    }).then((res) => {
                        this.reset(false, 0);
                        this.step   =   2;
                    }).catch((error) => {
                        this.reset(false, 0);
                        this.error  =   true;
                    });
                }
            }
        }
    }).mount('#app');
</script>
<style>
    .modal-backdrop.show {
        opacity: .9 !important;
    }
    .step-items {
        border-radius: 40px;
        width: 190px;
        font-size: 14px;
    }
    .step-items > div {
        gap: 10px;
    }
    .list-group-info {

    }
    th {
        text-align: center !important;
    }
    .indicator {
        width: 250px;
        height: 20px;
    }
    .indicator > div {
        height: 100%;
        width: 0;
        -webkit-transition: width 1s ease-in-out;
        -moz-transition: width 1s ease-in-out;
        -o-transition: width 1s ease-in-out;
        transition: width 1s ease-in-out;
    }
    .lds-roller {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }
    .lds-roller div {
        animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        transform-origin: 40px 40px;
    }
    .lds-roller div:after {
        content: " ";
        display: block;
        position: absolute;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #7c69ef!important;
        margin: -4px 0 0 -4px;
    }
    .lds-roller div:nth-child(1) {
        animation-delay: -0.036s;
    }
    .lds-roller div:nth-child(1):after {
        top: 63px;
        left: 63px;
    }
    .lds-roller div:nth-child(2) {
        animation-delay: -0.072s;
    }
    .lds-roller div:nth-child(2):after {
        top: 68px;
        left: 56px;
    }
    .lds-roller div:nth-child(3) {
        animation-delay: -0.108s;
    }
    .lds-roller div:nth-child(3):after {
        top: 71px;
        left: 48px;
    }
    .lds-roller div:nth-child(4) {
        animation-delay: -0.144s;
    }
    .lds-roller div:nth-child(4):after {
        top: 72px;
        left: 40px;
    }
    .lds-roller div:nth-child(5) {
        animation-delay: -0.18s;
    }
    .lds-roller div:nth-child(5):after {
        top: 71px;
        left: 32px;
    }
    .lds-roller div:nth-child(6) {
        animation-delay: -0.216s;
    }
    .lds-roller div:nth-child(6):after {
        top: 68px;
        left: 24px;
    }
    .lds-roller div:nth-child(7) {
        animation-delay: -0.252s;
    }
    .lds-roller div:nth-child(7):after {
        top: 63px;
        left: 17px;
    }
    .lds-roller div:nth-child(8) {
        animation-delay: -0.288s;
    }
    .lds-roller div:nth-child(8):after {
        top: 56px;
        left: 12px;
    }
    @keyframes lds-roller {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
    .error-item {
        animation: horizontal-shaking 0.25s linear infinite;
    }
    @keyframes horizontal-shaking {
        0% { transform: translateX(0) }
        25% { transform: translateX(2px) }
        50% { transform: translateX(-2px) }
        75% { transform: translateX(2px) }
        100% { transform: translateX(0) }
    }
</style>
@section('content')
  {{-- Default box --}}
  <div class="row">

    {{-- THE ACTUAL CONTENT --}}
    <div class="{{ $crud->getListContentClass() }}">

        <div class="row mb-0">
          <div class="col-sm-6">
            <div class="d-flex" style="gap: 10px;">
                @if ( $crud->buttons()->where('stack', 'top')->count() ||  $crud->exportButtons())
                    <div class="d-print-none {{ $crud->hasAccess('create')?'with-border':'' }}">

                        @include('crud::inc.button_stack', ['stack' => 'top'])

                    </div>
                @endif
                <button class="btn btn-success" data-toggle="modal" data-target="#orderCardModal">
                    <i class="las la-file-alt"></i> Импорт карт
                </button>
                    <button class="btn btn-info" data-toggle="modal" data-target="#orderCardModalAnalytics">
                        <i class="las la-file-medical-alt"></i> Аналитика
                    </button>
            </div>
          </div>
          <div class="col-sm-6">
            <div id="datatable_search_stack" class="mt-sm-0 mt-2 d-print-none"></div>
          </div>
        </div>

        {{-- Backpack List Filters --}}
        @if ($crud->filtersEnabled())
          @include('crud::inc.filters_navbar')
        @endif

        <table
          id="crudTable"
          class="bg-white table table-striped table-hover nowrap rounded shadow-xs border-xs mt-2"
          data-responsive-table="{{ (int) $crud->getOperationSetting('responsiveTable') }}"
          data-has-details-row="{{ (int) $crud->getOperationSetting('detailsRow') }}"
          data-has-bulk-actions="{{ (int) $crud->getOperationSetting('bulkActions') }}"
          cellspacing="0">
            <thead>
              <tr>
                {{-- Table columns --}}
                @foreach ($crud->columns() as $column)
                  <th
                    data-orderable="{{ var_export($column['orderable'], true) }}"
                    data-priority="{{ $column['priority'] }}"
                    data-column-name="{{ $column['name'] }}"
                    {{--
                    data-visible-in-table => if developer forced field in table with 'visibleInTable => true'
                    data-visible => regular visibility of the field
                    data-can-be-visible-in-table => prevents the column to be loaded into the table (export-only)
                    data-visible-in-modal => if column apears on responsive modal
                    data-visible-in-export => if this field is exportable
                    data-force-export => force export even if field are hidden
                    --}}

                    {{-- If it is an export field only, we are done. --}}
                    @if(isset($column['exportOnlyField']) && $column['exportOnlyField'] === true)
                      data-visible="false"
                      data-visible-in-table="false"
                      data-can-be-visible-in-table="false"
                      data-visible-in-modal="false"
                      data-visible-in-export="true"
                      data-force-export="true"
                    @else
                      data-visible-in-table="{{var_export($column['visibleInTable'] ?? false)}}"
                      data-visible="{{var_export($column['visibleInTable'] ?? true)}}"
                      data-can-be-visible-in-table="true"
                      data-visible-in-modal="{{var_export($column['visibleInModal'] ?? true)}}"
                      @if(isset($column['visibleInExport']))
                         @if($column['visibleInExport'] === false)
                           data-visible-in-export="false"
                           data-force-export="false"
                         @else
                           data-visible-in-export="true"
                           data-force-export="true"
                         @endif
                       @else
                         data-visible-in-export="true"
                         data-force-export="false"
                       @endif
                    @endif
                  >
                    {{-- Bulk checkbox --}}
                    @if($loop->first && $crud->getOperationSetting('bulkActions'))
                      {!! View::make('crud::columns.inc.bulk_actions_checkbox')->render() !!}
                    @endif
                    {!! $column['label'] !!}
                  </th>
                @endforeach

                @if ( $crud->buttons()->where('stack', 'line')->count() )
                  <th data-orderable="false"
                      data-priority="{{ $crud->getActionsColumnPriority() }}"
                      data-visible-in-export="false"
                      >{{ trans('backpack::crud.actions') }}</th>
                @endif
              </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
              <tr>
                {{-- Table columns --}}
                @foreach ($crud->columns() as $column)
                  <th>
                    {{-- Bulk checkbox --}}
                    @if($loop->first && $crud->getOperationSetting('bulkActions'))
                      {!! View::make('crud::columns.inc.bulk_actions_checkbox')->render() !!}
                    @endif
                    {!! $column['label'] !!}
                  </th>
                @endforeach

                @if ( $crud->buttons()->where('stack', 'line')->count() )
                  <th>{{ trans('backpack::crud.actions') }}</th>
                @endif
              </tr>
            </tfoot>
          </table>

          @if ( $crud->buttons()->where('stack', 'bottom')->count() )
          <div id="bottom_buttons" class="d-print-none text-center text-sm-left">
            @include('crud::inc.button_stack', ['stack' => 'bottom'])

            <div id="datatable_button_stack" class="float-right text-right hidden-xs"></div>
          </div>
          @endif

    </div>

  </div>

@endsection

@section('after_styles')
  {{-- DATA TABLES --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('packages/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('packages/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('packages/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">

  {{-- CRUD LIST CONTENT - crud_list_styles stack --}}
  @stack('crud_list_styles')
@endsection

@section('after_scripts')
  @include('crud::inc.datatables_logic')

  {{-- CRUD LIST CONTENT - crud_list_scripts stack --}}
  @stack('crud_list_scripts')
@endsection
