<template>
    <div class="container">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Choice the price in range:</label>
                <div class="col-sm-9">
                    <el-slider
                        v-model="priceRange"
                        range
                        :max="1000000"
                        @change="updateData"
                    >
                    </el-slider>
                </div>
            </div>
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">Bedrooms:</label>
            <div class="col-sm-2">
                <el-select v-model="bedrooms" clearable placeholder="Select" @change="updateData">
                    <el-option
                        v-for="item in options"
                        :key="item.value"
                        :label="item.label"
                        :value="item.value">
                    </el-option>
                </el-select>
            </div>
            <label class="col-sm-1 col-form-label">Bathrooms:</label>
            <div class="col-sm-2">
            <el-select v-model="bathrooms" clearable placeholder="Select" @change="updateData">
                <el-option
                    v-for="item in options"
                    :key="item.value"
                    :label="item.label"
                    :value="item.value">
                </el-option>
            </el-select>
            </div>
            <label class="col-sm-1 col-form-label">Storeys:</label>
            <div class="col-sm-2">
            <el-select v-model="storeys" clearable placeholder="Select" @change="updateData">
                <el-option
                    v-for="item in options"
                    :key="item.value"
                    :label="item.label"
                    :value="item.value">
                </el-option>
            </el-select>
            </div>
            <label class="col-sm-1 col-form-label">Garages:</label>
            <div class="col-sm-2">
            <el-select v-model="garages" clearable placeholder="Select" @change="updateData">
                <el-option
                    v-for="item in options"
                    :key="item.value"
                    :label="item.label"
                    :value="item.value">
                </el-option>
            </el-select>
            </div>

        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Search by name:</label>
            <div class="col-sm-3">
            <el-input v-model="name" clearable @input="updateData"></el-input>
            </div>
        </div>
        <el-table
            :data="tableData"
            border
            empty-text="No results found"
            style="width: 100%">
            <el-table-column
                prop="name"
                label="Name"
                width="180">
            </el-table-column>
            <el-table-column
                prop="price"
                label="Price"
                width="180">
            </el-table-column>
            <el-table-column
                prop="bedrooms"
                label="Bedrooms"
                width="180">
            </el-table-column>
            <el-table-column
                prop="bathrooms"
                label="Bathrooms"
                width="180">
            </el-table-column>
            <el-table-column
                prop="storeys"
                label="Storeys"
                width="180">
            </el-table-column>
            <el-table-column
                prop="garages"
                label="Garages"
                width="180">
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tableData: [],
                options: [
                    {
                    value: '1',
                    label: '1'
                }, {
                    value: '2',
                    label: '2'
                }, {
                    value: '3',
                    label: '3'
                }, {
                    value: '4',
                    label: '4'
                }],
                priceRange: [0, 1000000],
                bedrooms: null,
                bathrooms: null,
                storeys: null,
                garages: null,
                name: null,

            }
        },
        mounted() {
            this.updateData();
        },
        methods: {
            updateData() {
                axios.post('/api/search', {
                    name: this.name,
                    price_from: this.priceRange["0"],
                    price_to: this.priceRange["1"],
                    bedrooms: this.bedrooms,
                    bathrooms: this.bathrooms,
                    storeys: this.storeys,
                    garages: this.garages
                }).then(response => {
                    this.tableData = response.data.data;
                });
            }
        }
    }
</script>

