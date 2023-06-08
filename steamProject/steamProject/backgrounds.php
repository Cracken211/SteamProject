<?php
$backgrounds = [
  "gradient" => ['        
<div class="bg">
            <style>
                .bg {
                    width: 100%;
                    height: 100vh;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background-size: 300% 300%;
                    background-image: linear-gradient(-45deg, yellow 0%, yellow 25%, yellow 51%, #ff357f 100%);
                    -webkit-animation: AnimateBG 20s ease infinite;
                    animation: AnimateBG 20s ease infinite;
                }

                @-webkit-keyframes AnimateBG {
                    0% {
                        background-position: 0% 50%;
                    }

                    50% {
                        background-position: 100% 50%;
                    }

                    100% {
                        background-position: 0% 50%;
                    }
                }

                @keyframes AnimateBG {
                    0% {
                        background-position: 0% 50%;
                    }

                    50% {
                        background-position: 100% 50%;
                    }

                    100% {
                        background-position: 0% 50%;
                    }
                }
            </style>
        </div>'
  ],


  "floatingSquares" => ['<div class="context">
</div>
<style> @import url("https://fonts.googleapis.com/css?family=Exo:400,700");

.area{
    font-family: "Exo", sans-serif;
    z-index: -1;
}

.area{
    background: #4e54c8;  
    background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);  
    width: 100%;
    height:100vh;
    
   
}

.circles{
    position: absolute;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.circles li{
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: rgba(255, 255, 255, 0.2);
    animation: animate 25s linear infinite;
    bottom: -150px;
    
}

.circles li:nth-child(1){
    left: 25%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}


.circles li:nth-child(2){
    left: 10%;
    width: 20px;
    height: 20px;
    animation-delay: 2s;
    animation-duration: 12s;
}

.circles li:nth-child(3){
    left: 70%;
    width: 20px;
    height: 20px;
    animation-delay: 4s;
}

.circles li:nth-child(4){
    left: 40%;
    width: 60px;
    height: 60px;
    animation-delay: 0s;
    animation-duration: 18s;
}

.circles li:nth-child(5){
    left: 65%;
    width: 20px;
    height: 20px;
    animation-delay: 0s;
}

.circles li:nth-child(6){
    left: 75%;
    width: 110px;
    height: 110px;
    animation-delay: 3s;
}

.circles li:nth-child(7){
    left: 35%;
    width: 150px;
    height: 150px;
    animation-delay: 7s;
}

.circles li:nth-child(8){
    left: 50%;
    width: 25px;
    height: 25px;
    animation-delay: 15s;
    animation-duration: 45s;
}

.circles li:nth-child(9){
    left: 20%;
    width: 15px;
    height: 15px;
    animation-delay: 2s;
    animation-duration: 35s;
}

.circles li:nth-child(10){
    left: 85%;
    width: 150px;
    height: 150px;
    animation-delay: 0s;
    animation-duration: 11s;
}



@keyframes animate {

    0%{
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }

    100%{
        transform: translateY(-1000px) rotate(720deg);
        opacity: 0;
        border-radius: 50%;
    }

}</style>

<div class="area" >
    <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
    </ul>
</div >'
  ],

  "ps4" => ['

<style> 

.backwrap {
    background: #113243;
    /* Old browsers */
    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGwAAAA/CAYAAAAFfC2UAAAABHNCSVQICAgIfAhkiAAACUVJREFUeJzFnEnW3CoMhdE5nr6lZAXZ/7r0Bm5Qc9XgpsIgKYPAmK+ukIH66b8/f3mMMWjIRCZDl+45FBR52z3b3aFRpygPKpXWK829kbhTXBgdadv73gR0A04Jpg0lANHP/Hcp7Q4PQkaAHw8e2z64DwAtw8l6T8X3ZhVEYn+vCKZUG2Vh5V2mLQ0a27j4PgFk7ArVOK0U6kYtoMu45reKS1uHhQwL2X2QGbvtRmpueQKoAacNxtdBPmAtRf34QWJ7EY2V/eDtNz/49wGtw9H2rUDE2iwPfvhUr6eLE8mrxl2V1LT9trdhp71FQCtwlsB0gMApuzJfqXE77XfgA0DvftMUK1G4RKuOJ4BW4WRgijC9DGSq9BU4oaiFW+ysYre5DQXBDi9ycV1Agd0dMNR54t6o5E09hScnKxNQtF6zDqOkk5t/obUqygd+HVD2PtUMRGQuaP+d1GnHUkji1LK5qaoM7rbfpoLUURBWD8ST9h644uV5p7B7zQs2GyrVpV1gPDwczGHndeXiXMsAT6icu2DgtyK1+z68KJLpALur1EDZibD+jooQoCJKHDfBgECnOWullz9LAgKpjPgLOKuIF2etpBsqgoDMvJjOTzmYZFYImyjv8S+S6kKyJHUWDwl22m5+MP1c5KPFYI47rzpusK0YF92E981Ls3Z+kMDLcDi1kbc9kwjrNTQ/njGkNUARnDUwtcp77fws0RguuIhs+dxw8RYirK9cXWcOwoD6cBIwi5FlbFbbrmLt7WTxGLzST9yPTbu7BypaBhRYNYKWoGLXum3RTXlL+YqHh52D3fzDVpA6KqoBXY6xobKZXbmTBoTu/R4nEwUGMtR3P1wm6Rx55cL6FFKlogpQI6IUnQhKM6BJeZAaM8piCuafsvkDlgFLpnyLQVklrakIA0JwZn7p1JpQ0uXicuDugtOKgq0EKmMZjIQVd5hmA1PUaEGypQ0X57Zygl4mAQIckk9dHWqrv46Ym7AeZbDbzGLcN9USdHkxJDwPoYEMwBsblF49TpB9iZdTvxW89R+sdJC1OUbgMN/mgINBvQ3JaqAH6NFxghTGV4FFL/lh9C/EHqqxOT5ug4ya2nOShxSqaAlQNLiTCGqpTrDibxOf/yRPQN7mqjbgucTvID3bEI1sRVkBpHHE9NPEVKwhjgF3m+dQsl7pmAaJy8vcXQapAYiie6rs+IFbQJL58ru0n+uo+seD4+djG9aPEavJzXFPITUBBZ0PH3wJxq+g+ZfhyI6CFQ4JcstBBWq6C4lAW8qkmOdU1UYggnJc0ZfgjHtjELVLO9gVDRK6RBeIqI/GdaqsRUhtQEUgAruwAuJtaHHI7u8koDqgHuTWA5Wp6Rkk/J6VBCLOZE1pORvrUXqJ3adoHkIZWhCupoF4HSSt3F6upqeQkkAkvKe3xSZ3YsO1GtQ91TuFNJC71GmqS7bqD+HcBrUAKVKmK0qU5oTZUNojzycr31iWEtUIvYtFMM3qSHiQtHJ7eBNTfx3WIfUAxXDgJAH6uVq6Zp1v/QfvYhFM0hDV2fq9PAKVuD1UH5TJeuWutSjHwxPBscru1Hk3wVuYVQ4HFcEEELcZur8ICrWhsnNIHlHk0oJZszzj8QNq7pbJeQ4BU4EEENOlqdD1haCA67yq3oBEwN5+WnWBzvV/l1T0mJ3nEDA1SA9RrdaLFh6AytR0D1IOCAyEuG88TN+rbDo//MW65iYIc65uXKXM9scQL4CK1HQXUrVrTbhVaOuyvoYWRXvm7n7awmE+nUHHGGO+i70FKlPTA0ghIAQS5MPcL8AZdwZv4c9xXKoUY6C2VypVfQdqBVIBKIADZ6rVOe9WAnNSsfWv6rJ9Drn4awe8GeKTsR3GVgsomOMCpZ11QhUAQO5TZ65z6Sm0+gcO005v/Z/57MZEA3RriWOY4UZHuJGqkKLCYASAvpqJy7CCEKBo4KVXyNIquHxpig0U/OVDEC1A7r44J+7vFVDZ6SyrnS4gCsCswKhse2uIZKBcV+n5jQOggbdhWJWq5qC15qgWKKwmDMkOEFJOMoiNH0/0sO5W5dn64CwHkc9nayvhDfuT2dnK1aGeql4AFakpgVQDsvOB62GdIjMX2WVtiABDtYEgiuUrADr4MUTuAjNVpQP9wjZODskDeuc4QVS/k/agwZvzYKt0AxDB2+bNJyzoAp+oqgDl3V6mJkuErKWtCtpzBviqgsLp5YhXORBEA9A0dsLzKx17qe51AStUFZk613+RorpqIt1cARFaLpEJEvpuXCna+kcQPUB1JE4ob650pLCiw6bZ+1hTVSug2rsD5j6ROoF9N3uMkUQbK1v/ACDL8/ZaedfZ+hYsO8ehOkeeB4xAiTpnP1A+mbquP7oO6X+gDf64qDRgzhZW9A4mh8Aq8HourTw+d5yfw+q5wJ6qClCgrs7GEDWcptIqfg4GaPvyin7d0J/b2AFB5fH1By5tx76ChVWF/zgZcH0IMsy3948AIT/l+5cmKREst+uDjX49QAnvWDiWZXgtkeyz6rLzXwcLzVeVC7y/6IxBVZAQIP+UurgBDrxL6RV65CI1QA1PLBwf9flaS7Q/mXUPqx8yVtYweTdcYOn+alCqLug/smhBgTjPAxe+bAoPnOFQ0d/+zzneV2Qo91MGHSH9GMxyP2wWz9uSyW25wS6sp6pCfcB11d2SkL+brQqzSFG59uG3/A2gqbpjZcQpjsUvMN0gzg/ge6lKvDsK2uzA6qoKKQpBdvm2jrNeS6Aaw21/s+Uv4YF3LhpIcaS3V/wnDHD/D8HCrvTMew4rUhXwBqqP/lnCQCS5dAmq61AKyRwLUMBTqjvykatkGmppam3eshuUswzvZ4GtjjuwnBoWQEFI7kGHTRmz8CCUCd0lQFZBigY3d6BPZc1XhROam8M6XUWaVFd28AN1rsLSLhDAaoEi9Z93rMir4LS7NplzqIXEtVHW+RqDwJH6G1NebUy8/yUcv8wjPgJ1+V5nrtA2bAdIl70JC/5NfuUNRJl3Gb0k4ZztijkHw9vB8bXEIQANqTY+ivbP88XZ3X1FXQWA0AutfgE6sBJVOVBYabJOGfHb9cCr6gwWDj2NudXPCsDu+c7681UhgqaBheoKn0lf3FLXtIlKn79qgPbVF+PIyqJJ3OVhf7ygXJ0ANMMK2oFCtdXQ/gcuwOHw7FlvygAAAABJRU5ErkJggg==");
    background-repeat: no-repeat;
    background-size: 100% 100%;
    width: 100%;
    height: 100%;
    position: fixed;
    left: 0;
    top: 15;
    z-index: 1;
  }
  

  .back-shapes {
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
  }
  
  .back-shapes img {
    opacity: 0.2;
    position: absolute;
    width: 1.5%;
  }
  
  .floating {
    position: absolute;
    animation-name: floating;
    -webkit-animation-name: floating;
    animation-duration: 5s;
    -webkit-animation-duration: 5s;
    animation-iteration-count: infinite;
    -webkit-animation-iteration-count: infinite;
  }
  .floating.circle {
    display: inline-block;
    width: 39px;
    height: 39px;
    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACcAAAAnCAYAAACMo1E1AAAABHNCSVQICAgIfAhkiAAAA0pJREFUWIXdmL1O40AQx8fZ5BxQCqRrLqKxqKjAOl0JvMHxBIjHyCu4dGkJ+khpQNa9QeTyZIkihbtYCKWwbC1KFXbtvYJxbrIYMOBD1o20UhDe//x2dnb2w1BKQVut25SQYRhG+Vs1NGLjvToI0yHNwKawFWV7L+yb4AhQFwC6QRB8tyzrxDTN3V6vN2SMfc3zPBVCLFar1d18Pp8eHR2FACCxvQ1UKfVqg8eIMADo+75/kKbphRDiVtUwIcRtmqYXvu8fAEAfdYxafmuC9TzPs5IkuSyK4qEOlG5FUTwkSXLpeZ4FAL06gHXA+mEYnkops1f851LKe6VU/tJHUsosDMNTjOKLgK+CxXE8KopCVDjhWZZNZrPZ2Xg83rdtewcABrZt74zH4/3ZbHaWZdlESskroijiOB69BvgSmBnH8ahq9JzzK8dxLBTvweZqLRdNDwD6juNYnPOrKh0ENJ8DfDbHwjA81SMmpUyiKDoHgO06iU0W0nYURedSykSPIE5xZQ5WCTLP8yw9x5bL5dR13b26yVw1YNd195bL5VQbcIaLhL0IV+ZZkiSXesQQrPtWME2767runh7BJEkuq/LvSdR83z/QywVO5Zf3gmmAX6IoOtem9wHr4Eb09M5mmqYXtCPn/AoAtgCg8xEw4qMDAFv6IknT9AIAzEo4HNWAVn4pJcdV+SQfPgjIHMexaJkRQtwCwIDOzkaHIAiO6WiyLJvUKZbvnN5+lmUT6i8IgmMaiA7ZZpllWSd0310sFr8AIFeo2JShXo76a0P/rPybwhmmae7Sj29ubn4DQN4kGLEc9deG/tfnwo0wc86vSZRz3JIanVI6tbZt7yiyF3POr4Gk0QYcLZBSynvQEvQf5N0ADwtKqcdCT+HotEKe52n5mzE2sG27sWN8ldm23WWMDar8A2DOYYIqIcSC/m80Gn0DmgPNmoH66wChf1UuQBo5tVqt7mjvw8PDH0BWT8PGUH9t6H9dGShcPp/Pp/Tj4XD4EwAYvVk1YajHUH9t6P9vddATtJU7BHZq595ajqjNp5L2nufK6LXyJEyFWnmHIKLtu31pgO27t+qArbvxa4DteyvRAD/9lanV73P/z8tmDVgAaMGb8GfYHwpq7kYvpXclAAAAAElFTkSuQmCC");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    opacity: 0.5;
  }
  .floating.square {
    display: inline-block;
    width: 35px;
    height: 35px;
    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACMAAAAjCAYAAAAe2bNZAAAABHNCSVQICAgIfAhkiAAAAUNJREFUWIXt2DFugzAUBuD/EVMGJMyQsZ3aA+QQ3ZjrIzKQgYWD5ACVOjRjBkBiSHF4XRJEIzmBCgiD/83Ysj9ZxrJNzIylRHQLREQAaMbxmTuz0WKUUk9Zlj0XRbHSWk8OEkKwlPKklNonSfLTYojISdP0JYqiz6kR16nr+o2Ivpi5cS4fy7JczQ25Hte51XDuCFOF1vpQVdWOiEb73ZiZfN/fCCHWgzBVVe3CMPwAcAQwBogAeHmeb6WU74Mw5xk5jozBrZk2Yjr5sxf8W0L3d4tFLWCLMcViTLEYUyzGFIsxxWJMsRhTFoXpc7iiPgejPv3ca2DEMDMB8C7FkTDeud9hGN/3N3meb6e4HQzGCCHWplP8VFnUAm4xQRCcHgHojisAgJkbpdS367qvc79CxHG8Z+YGAKh7JXr0+wwt6eXqFzNGfAM6wJFPAAAAAElFTkSuQmCC");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    opacity: 0.5;
  }
  .floating.triangle {
    display: inline-block;
    width: 35px;
    height: 35px;
    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACkAAAAjCAYAAAAJ+yOQAAAABHNCSVQICAgIfAhkiAAABARJREFUWIXNVj2IGlsU/sa/3XWDRWCICyFNTF4Rq7AQSJUmiKRN2rAuBlKlM03gRV4lj9hYmSLwigQMCA9iZcAmNrIpDLurNiNKoiiODE+HmXXezNz7ird3ubvPdf17cQ9MMXfunPud75zvniNQSnHZzbFqANPYUkEKguDY3t52C4Kw3OAppUt5ADjC4bBP1/U/w+GwD4Bjab6XBFAAsNZqtV5RSmmr1XoFYA2AcJlAOlOp1E3btgeUUmrb9iCVSt0E4LwUII9Z3FAU5T3lTFGU9wA2lsHmMkC6isXiA0qpTU+bXSwWHwBwrRQk/r0dNnVd/0rHmK7rXwFsLiqiRUF66vX6cx7Y0dGRxL/X6/XnADwrAQnAEYvF/KZpdhkgwzB+7O7u/mIYxg+2ZppmNxaL+Rdhc16AAoD1Xq+X4lmr1Wo7ADZrtdoOv97r9VIA1ucV0bwgnblc7i4hxGBANE0rHtefE8CmpmlF9o0QYuRyubvzXklzpRmAV1XVzxwIq1Ao3GdKBuAqFAr3CSEW26Oq6mcA3nnSPg9Id6VSecKns9/vv+PTycqh3++/4/dVKpUnANz/K0gAjlAodNUwjBMFW5alJBKJG2cZAuBIJBI3LMtS2F7DMKRQKHR1VjZnFctau91+zbPTbDZj510xADzNZjPG72+3269n7esziSWdTt+ybVtlB45Go0ogEDh34gHgCAQCvtFoVGH/2LatptPpW7OIaBYWNxRF+cizUi6XH13U9gC4yuXyI/4/RVE+ztLXpwXpKpVKDymlhB00GAw+TXMQC3AwGHzicJJSqfRw2r4+lVhEUbyi6/q3kxMIOcpkMsFpUwbAmclkgoSQI+ZD1/VvoihemUZE0xzgaTQaL/h0dTqdN7MUPxNdp9N5w/tpNBovpunrF7IYj8evW5YlM8emabaj0ei1ma8RwBGNRq+ZptlmvizLkuPx+PWLfF0U/bosy2/56CVJejbvVAPAI0nSM96fLMtvL+rrE8WSz+fvEUJM5lDTtL1F5kM2f2qatsd8EkLMfD5/b5KIJjpTVfULF/RSJu1xk7yqql8mBX+eI3e1Wn3Kp0VRlA+z3G0TQLI79wPvv1qtPj2vr49lMRKJiIZhfD+h0LaHyWTyNgDP8Si26ONJJpO3bdsesjMMw/geiUTEcWyyqQUAIAiCAMDT6XR+8/v9L9m6LMvZw8PDP3w+n4kl2XA4dAeDwR1RFB+ztW63+/vW1tavAP6mPLAzLDqz2ewdQohOV2CEED2bzd7BmSbxn1o5075+uo1rt6dYlCQpvEqAzCRJCvNsurgyIfv7+3sHBwcBXdcdlmUJy6q/ac3lclGv10sopX8BIGx9nHB+OrgxRikH7BTIy2r/AAlu0j5Iy8AaAAAAAElFTkSuQmCC");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    opacity: 0.5;
  }
  .floating.cross {
    display: inline-block;
    width: 35px;
    height: 35px;
    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACUAAAAlCAYAAADFniADAAAABHNCSVQICAgIfAhkiAAAAgJJREFUWIXN2MFO4zAQBuDfbSpaiUOvvTRS3w6EoEChwAvsZS9IvAnwOK5rV5V7Se8cNrOHNVXWpMk4caEj5dDInvkySeMkgohwbNH5aUBZJP4OIYQA0HU//9ABWllXo+MN7gDobzab+/V6fQbgxCWIDTqx1k6ttdPSGkQEBxUABsaYJ/oXuZTyGkAfgPgc12ZzNfpa6zkR5USUa63nfo3ihMRae0f/Ry6lvIkBKwHtalhrZwCSz7H+hU5u23V7Mpn8llKel7Y58JRpra/G4/EvB9wfjCMhIsoXi8Vtk47V5a08fZwEy+UyCNYE9AUVE9YUVIpiwmZVsDagvag2sLagShQTdlcsEANUiwqEJTFALBSzA/cAhjFAbBQHlmXZWwxQEIoB86MRKBhVgA2UUg8VsFwp9QBgEApqhHKwLoBhlmXvZaLtdvsKYAig2yj/ATs1/5ZOhV5T/n0sOorx73sv298EFgXk/mV771N1a2UwKmDpqLyjh8BigVhrH/uxJxaIO48Diwrizq97tI4O4uapeks6CKgt7GAgbl6l1NTPW5ycWGtnMUFc2Gq1ukTFy6gfZIx5TNP0GcAHuQqh4eZ9pGn6bIx5hPfC2+v1Tv0J+46mdYc4HTPGPMFbuEXx4AtfRC4AYDQavbTpUFl4NUShRr4b49c7hu9TX1DHEEf5efEvSKr5qd+QqggAAAAASUVORK5CYII=");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    opacity: 0.5;
  }
  
  @keyframes floating {
    0% {
      transform: translateY(0%) rotate(-55deg);
    }
    50% {
      transform: translateY(300%) rotate(55deg);
    }
    100% {
      transform: translateY(0%) rotate(-55deg);
    }
  }
  @-webkit-keyframes floating {
    0% {
      -webkit-transform: translateY(0%);
    }
    50% {
      -webkit-transform: translateY(300%);
    }
    100% {
      -webkit-transform: translateY(0%);
    }
  }</style>

<div class="backwrap gradient">
  <div class="back-shapes">
      <!-- All this img tags was autogenerated by custom written js tool -->
      <span class="floating circle" style="top:66.59856996935649%;left:13.020833333333334%;animation-delay:-0.9s;"></span>
      <span class="floating triangle" style="top:31.46067415730337%;left:33.59375%;animation-delay:-4.8s;"></span>
      <span class="floating cross" style="top:76.50663942798774%;left:38.020833333333336%;animation-delay:-4s;"></span>
      <span class="floating square" style="top:21.450459652706844%;left:14.0625%;animation-delay:-2.8s;"></span>
      <span class="floating square" style="top:58.12053115423902%;left:56.770833333333336%;animation-delay:-2.15s;"></span>
      <span class="floating square" style="top:8.682328907048008%;left:72.70833333333333%;animation-delay:-1.9s;"></span>
      <span class="floating cross" style="top:31.3585291113381%;left:58.541666666666664%;animation-delay:-0.65s;"></span>
      <span class="floating cross" style="top:69.96935648621042%;left:81.45833333333333%;animation-delay:-0.4s;"></span>
      <span class="floating circle" style="top:15.117466802860061%;left:32.34375%;animation-delay:-4.1s;"></span>
      <span class="floating circle" style="top:13.074565883554648%;left:45.989583333333336%;animation-delay:-3.65s;"></span>
      <span class="floating cross" style="top:55.87334014300306%;left:27.135416666666668%;animation-delay:-2.25s;"></span>
      <span class="floating cross" style="top:49.54034729315628%;left:53.75%;animation-delay:-2s;"></span>
      <span class="floating cross" style="top:34.62717058222676%;left:49.635416666666664%;animation-delay:-1.55s;"></span>
      <span class="floating cross" style="top:33.19713993871297%;left:86.14583333333333%;animation-delay:-0.95s;"></span>
      <span class="floating square" style="top:28.19203268641471%;left:25.208333333333332%;animation-delay:-4.45s;"></span>
      <span class="floating circle" style="top:39.7344228804903%;left:10.833333333333334%;animation-delay:-3.35s;"></span>
      <span class="floating triangle" style="top:77.83452502553627%;left:24.427083333333332%;animation-delay:-2.3s;"></span>
      <span class="floating triangle" style="top:2.860061287027579%;left:47.864583333333336%;animation-delay:-1.75s;"></span>
      <span class="floating triangle" style="top:71.3993871297242%;left:66.45833333333333%;animation-delay:-1.25s;"></span>
      <span class="floating triangle" style="top:31.256384065372828%;left:76.92708333333333%;animation-delay:-0.65s;"></span>
      <span class="floating triangle" style="top:46.47599591419816%;left:38.90625%;animation-delay:-0.35s;"></span>
      <span class="floating cross" style="top:3.4729315628192032%;left:19.635416666666668%;animation-delay:-4.3s;"></span>
      <span class="floating cross" style="top:3.575076608784474%;left:6.25%;animation-delay:-4.05s;"></span>
      <span class="floating cross" style="top:77.3237997957099%;left:4.583333333333333%;animation-delay:-3.75s;"></span>
      <span class="floating cross" style="top:0.9193054136874361%;left:71.14583333333333%;animation-delay:-3.3s;"></span>
      <span class="floating square" style="top:23.6976506639428%;left:63.28125%;animation-delay:-2.1s;"></span>
      <span class="floating square" style="top:81.30745658835546%;left:45.15625%;animation-delay:-1.75s;"></span>
      <span class="floating square" style="top:60.9805924412666%;left:42.239583333333336%;animation-delay:-1.45s;"></span>
      <span class="floating square" style="top:29.009193054136876%;left:93.90625%;animation-delay:-1.05s;"></span>
      <span class="floating square" style="top:52.093973442288046%;left:68.90625%;animation-delay:-0.7s;"></span>
      <span class="floating square" style="top:81.51174668028601%;left:83.59375%;animation-delay:-0.35s;"></span>
      <span class="floating square" style="top:11.542390194075587%;left:91.51041666666667%;animation-delay:-0.1s;"></span>
  </div>
</div>'
  ],

  "particle" => ['
  
  <div class="glowing">
    
    <span style="--i:1;"></span>
    
    <span style="--i:2;"></span>
    
    <span style="--i:3;"></span>
    
  </div>
  
  <div class="glowing">
    
    <span style="--i:1;"></span>
    
    <span style="--i:2;"></span>
    
    <span style="--i:3;"></span>
    
  </div>
  
  <div class="glowing">
    
    <span style="--i:1;"></span>
    
    <span style="--i:2;"></span>
    
    <span style="--i:3;"></span>
    
  </div>
  
  <div class="glowing">
    
    <span style="--i:1;"></span>
    
    <span style="--i:2;"></span>
    
    <span style="--i:3;"></span>
    
  </div>
  
  <style> 
  * {
    margin: 0;
    padding: 0;
  }
  
.background-container-profile {
    display: flex; 
    justify-content: center;
    align-items: center;
    width: 100%;
    min-height: 100vh;
    background: #000;
    overflow: hidden;
  }
  
  .glowing {
    position: relative;
    min-width: 700px;
    height: 550px;
    margin: -150px;
    transform-origin: right;
    animation: colorChange 5s linear infinite;
  }
  
  .glowing:nth-child(even) {
    transform-origin: left;
  }
  
  @keyframes colorChange {
    0% {
      filter: hue-rotate(0deg);
      transform: rotate(0deg);
    }
    100% {
      filter: hue-rotate(360deg);
      transform: rotate(360deg);
    }
  }
  
  .glowing span {
    position: absolute;
    top: calc(80px * var(--i));
    left: calc(80px * var(--i));
    bottom: calc(80px * var(--i));
    right: calc(80px * var(--i));
  }
  
  .glowing span::before {
    content: "";
    position: absolute;
    top: 50%;
    left: -8px;
    width: 15px;
    height: 15px;
    background: #f00;
    border-radius: 50%;
  }
  
  .glowing span:nth-child(3n + 1)::before {
    background: rgba(134,255,0,1);
    box-shadow: 0 0 20px rgba(134,255,0,1),
      0 0 40px rgba(134,255,0,1),
      0 0 60px rgba(134,255,0,1),
      0 0 80px rgba(134,255,0,1),
      0 0 0 8px rgba(134,255,0,.1);
  }
  
  .glowing span:nth-child(3n + 2)::before {
    background: rgba(255,214,0,1);
    box-shadow: 0 0 20px rgba(255,214,0,1),
      0 0 40px rgba(255,214,0,1),
      0 0 60px rgba(255,214,0,1),
      0 0 80px rgba(255,214,0,1),
      0 0 0 8px rgba(255,214,0,.1);
  }
  
  .glowing span:nth-child(3n + 3)::before {
    background: rgba(0,226,255,1);
    box-shadow: 0 0 20px rgba(0,226,255,1),
      0 0 40px rgba(0,226,255,1),
      0 0 60px rgba(0,226,255,1),
      0 0 80px rgba(0,226,255,1),
      0 0 0 8px rgba(0,226,255,.1);
  }
  
  .glowing span:nth-child(3n + 1) {
    animation: animate 10s alternate infinite;
  }
  
  .glowing span:nth-child(3n + 2) {
    animation: animate-reverse 3s alternate infinite;
  }
  
  .glowing span:nth-child(3n + 3) {
    animation: animate 8s alternate infinite; 
  }
  
  @keyframes animate {
    0% {
      transform: rotate(180deg);
    }
    50% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }
  
  @keyframes animate-reverse {
    0% {
      transform: rotate(360deg);
    }
    
    50% {
      transform: rotate(180deg);
    }
    
    100% {
      transform: rotate(0deg);
    }
  }</style>
'
  ]
];