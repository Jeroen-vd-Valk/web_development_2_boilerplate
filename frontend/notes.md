
![](img%5C01_intro_to_vue_7.png)

# Vue single-file components



      * These are the \.vue files\. But what are they exactly?
      * A vue component \(\.vue file\) contains 3 sections:
      * HTML template
      * Javascript \(or Typescript\)
      * CSS styles
      * In short:
      * They are an easier way to work with vue compared to writing your code in \.js files\.
      * Vite compiles the \.vue files to working javascript code


Vue\.js workshop 1 – up & running with vue\.js



      * Note:
      * You can use vue without single file components
      * But on larger projects \(more than 1 page\) it quickly becomes advantageous to start using them


Vue\.js workshop 1 – up & running with vue\.js

# 2 ways of writing components



      * Options API
      * Uses a standard set of parts for the script part of the component\.
      * Advantage: easy to learn and get started\.
      * Disadvantage: Complex components are more difficult to read and maintain\.
      * Composition API \(recommended approach\)
      * Allows more flexibility in how to organize the script part of the component\.
      * Advantage: Code can be structured as you like\, potentially enabling better readability by structuring per concern/responsibility\.
      * Disadvantage: Requires deep understanding of Vue components to do right\.


Vue\.js workshop 1 – up & running with vue\.js

![](img%5C01_intro_to_vue_8.png)

# Vue components: Reactivity



      * Vue components can react automatically if variables change\. But only if they are reactive\.
      * The ref function returns a reactive objectwith the specified value \(in this case 0\)\.
      * This way\, if any code changes the count value\,the value displayed on the page will updateautomatically


Vue\.js workshop 1 – up & running with vue\.js

# Vue components: Computed properties



      * If you need to run some logic that includes reactive data\, you should use computed properties\.
      * Here we want to determine a valuebased on something else\.\(return ‘Yes’ if the books array containssomething\)
      * The value is cached\, so this methodonly runs if the author\.books objectchanges\.


![](img%5C01_intro_to_vue_9.png)

Vue\.js workshop 1 – up & running with vue\.js

# Vue components: Props



      * Props are variables that allow values to be passed to the component\.
      * First\, we use defineProps to declare our props
      * Then\, when we use the component\, we can specify the values as HTML attributes\. Note that the camelCase prop name automatically changes to kebab\-case when used in HTML\.
      * You can also use still camelCase\.


![](img%5C01_intro_to_vue_10.png)

![](img%5C01_intro_to_vue_11.png)

Vue\.js workshop 1 – up & running with vue\.js

# Vue components: Lifecycle Hooks



      * Lifecycle hooks allow us to run code at specific moments during the component lifecycle\.
      * For example: the onMounted hook is ideal for loading in data \(from a backend\)


![](img%5C01_intro_to_vue_12.png)

Vue\.js workshop 1 – up & running with vue\.js

# Vue components: the html section



      * Just HTML\, with extra’s:
      * Just display some plain data? \{\{ variableName \}\}
      * Want to display HTML? Use v\-html
      * Want to display an element conditionally? Use v\-if
      * Want to loop data or just an X number of times? Use v\-for
      * Want to reactively bind data? Use v\-bind for html attributes \(shorthand: : \)
      * Want 2\-way binding? Use v\-model for html input elements
      * Want to respond to events? Use v\-on \(shorthand: @ \)
      * [https://vuejs\.org/guide/essentials/template\-syntax\.html](https://vuejs.org/guide/essentials/template-syntax.html)


Vue\.js workshop 1 – up & running with vue\.js

# Vue components: the css section



      * This is just CSS\.
      * The interesting part is that it can be scoped\.
      * So\, you can create CSS rules that apply only to your component and not to the rest of the application\.
      * There are extensions available to use SASS/LESS here\.


Vue\.js workshop 1 – up & running with vue\.js

# Demo



      * First\, let’s walk through what we discussed on the previous slide with some practical examples\.
      * After this demo\, you will get an assignment to create a new component by yourself\. The assignment will be split up into several steps\.

