   @foreach ($univ as $univers_simple)

                   <?php
                   /*$img = DB::table('recipe_imgs')->where('recipe_id', '=', $univers->id)->first();
                   $first = $img;
                   $starsget = (new \App\Search)->explode_star($univers->id);*/
                   //			$type = DB::table('type_recipes')->where('id', $univers->type)->first();

                   ?>

                   <div class="flex-1 is-6 is-result">
                       <div class="flex mb-4">
                           <div class="flex-1 is-4 to-hover is-paddingless m-0">
                               @if(isset($type))
                                   <div class="hovered">
                                       <a class="tag" style="margin:0.5rem"
                                          href="{{route("type.show", lcfirst($type->name))}}">{{$type->name}}</a>
                                   </div>
                               @endif


                           </div>
                           <div class="flex-1 is-7">
                               <div class=" is-flex">
                                   <a href="{{route('univers.show',$univers->name)}}"><h2 class="title">
                                           @php echo str_limit($univers->name, 20, ' (...)'); @endphp
                                       </h2></a>
                               </div>
                               <div class="liste_recettes">
                                    Ingredients

                               </div>

                           </div>
                           <div class="flex-1 is-1 ">
                               <div class="top">

                               </div>
                               <div class="middle">

                               </div>
                               <div class="bottom">
                                   <LikeRecipe :recipeid="'{{$univers->id}}'" :userid="'{{ Auth::id() }}'"></LikeRecipe>
                               </div>

                           </div>
                       </div>
                   </div>


               @endforeach