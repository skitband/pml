<template>
    <b-sidebar
      id="sidebar-backdrop"
      title="New Pizza Order"
      backdrop
      shadow
    >
        <div class="px-3 py-2">
            <b-form :action="this.route" method="post">
                <input type="hidden" name="_token" :value="csrf">
                <div v-for="(pizza, index) in pizzas" :key="index">

                  <b-button size="sm" @click="removePizza(index)" type="button" variant="danger"><b-icon icon="trash"></b-icon></b-button>
                  <br />
                  <b-form-group 
                      label="Size:" label-for="pizza_size">
                      <b-form-select
                      v-model="pizza.pizza_size"
                      :options="pizza_sizes"
                      required
                      name="pizza_size[]"
                      ></b-form-select>
                  </b-form-group>

                  <b-form-group 
                      label="Crust:" label-for="pizza_crust">
                      <b-form-select
                      v-model="pizza.pizza_crust"
                      :options="pizza_crusts"
                      name="pizza_crust[]"
                      required
                      ></b-form-select>
                  </b-form-group>

                  <b-form-group 
                      label="Type:" label-for="pizza_type">
                      <b-form-select
                      :options="pizza_types"
                      name="pizza_type[]"
                      required
                      ></b-form-select>
                  </b-form-group>

                  <div>
                      <b-form-group label="Topping Whole:" label-for="topping_whole">
                      <b-form-checkbox-group
                          v-model="pizza.selected_topping_whole"
                          :options="toppings_options"
                          name="topping_whole[]"
                          stacked
                      ></b-form-checkbox-group>
                      </b-form-group>

                      <b-form-group label="Topping First-Half:" label-for="topping_firsthalf">
                          <b-form-checkbox-group
                              v-model="pizza.selected_topping_firsthalf"
                              :options="toppings_options"
                              name="topping_firsthalf[]"
                              stacked
                          ></b-form-checkbox-group>
                      </b-form-group>

                      <b-form-group label="Topping Second-Half:" label-for="topping_secondhalf">
                          <b-form-checkbox-group
                              v-model="pizza.selected_topping_secondhalf"
                              :options="toppings_options"
                              name="topping_secondhalf[]"
                              stacked
                          ></b-form-checkbox-group>
                      </b-form-group>
                  </div>
                  <hr />
                </div>
                
                <b-button size="sm" @click="addPizza" type="button" variant="secondary" block>Add More </b-button>

                <b-button type="submit" variant="info" block>Submit</b-button>
            </b-form>
        </div>
    </b-sidebar>
</template>

<script>
  export default {
    props: ['route'],
    data () {
      return {
        pizzas: [
          {
            pizza_size: '',
            pizza_crust: '',
            pizza_type: '',
            selected_topping_whole: [],
            selected_topping_firsthalf: [],
            selected_topping_secondhalf: [],
          }
        ],
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        pizza_sizes: ['Small', 'Medium', 'Large'],
        pizza_crusts: ['Hand Tossed', 'Deep Dish'],
        pizza_types: ['Hawaiian', 'Chicken Fajita', 'Pepperoni Feast', 'Custom'],
        toppings_options: [
          { text: 'Pineapple', value: 'pineapple' },
          { text: 'Pepperoni', value: 'pepperoni' },
          { text: 'Mushrooms', value: 'mushrooms' },
          { text: 'Extra Cheese', value: 'extra_cheese' },
          { text: 'Sausage', value: 'sausage' },
          { text: 'Ham', value: 'ham' },
          { text: 'Onions', value: 'onion' },
          { text: 'Bacons', value: 'bacons' },
          { text: 'Black olives', value: 'black_olive' },
          { text: 'Green peppers', value: 'green_pepper' },
          { text: 'Spinach', value: 'spinach' },
          { text: 'Mozzarella', value: 'mozzarella' },
        ],
        show: true,
        showToppings: false,

      }
    },
    methods: {
      onSubmit(evt) {
        evt.preventDefault()
        let formAction = evt.target.action;
        console.log(formAction);
      },
      addPizza () {
        this.pizzas.push({
            pizza_size: '',
            pizza_crust: '',
            pizza_type: '',
        })
      },
      removePizza (index) {
        Vue.delete(this.pizzas, index);
      },
    }
  }
</script>