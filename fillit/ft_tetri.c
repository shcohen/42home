/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_tetri.c                                         :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/17 15:42:36 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/18 20:21:07 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

// checker si 4 caracteres par ligne
// si que ./# ; # mais pas aligné ; \n au dernier tetri ; 2\n entre tetri = X
// que bien 2 # qui touche 2 autres (+ 26tetri = error)
// (1er c = t0, si i+5 > t0 + 20 = X ; si i-5 < t0 = X) ((i - t0 + 1)%5)
// verifier dans buffer, si tetri valide alors ->liste dans maillon indé (strsub)
// puis dans chaque maillon, verifier si y a bien 21c ((nb maillon x 21) + nb maillon)

#include "include/fillit.h"

t_tetri    *ft_create_tetri(char *str)
{
    t_tetri *new;
    int i;
    static int count = 0;

    i = 0;
    if (!(new = ft_memalloc(sizeof(t_tetri))))
        return (NULL);
        new->next = NULL;
    new->str = ft_strsub(str, 0, 20);
    while (str[i] && i < 21)
        i++;
//  if (i < 21)
//      retorner une erreur;
    if (i == 21)
        new->next = ft_create_tetri(&str[21]);
    return (new);
}

int    ft_tetri1(t_var *var)
{
    t_tetri *lst;
    t_tetri *first;
    int i;

    i= 0;
    first = ft_create_tetri(var->str.buf);
    lst = first;
    while (lst)
    {
   //     printf("|%s|\n", lst->str);
        i = 0;
        while (lst->str[i])
        {
            if (lst->str[i] == '\n')
                if (!(i % 5))
                    return (-1);
            i++;
        }
        lst = lst->next;
    }
    /*
    int i;
    int j;
    int k;
    int l;

    i = 0;
    j = 0;
    k = 0;
    l = 0;
    while (i <= 21)
    {
        printf("\n%c\n",var->str.buf[i]);
        if (var->str.buf[i] != '.' && var->str.buf[i] != '#'
        && var->str.buf[i] != '\n')
           return (-1);    
        if (var->str.buf[i] == '#') // +4 #
        {
            j++;
            if (j > 4)
                return (-1);
        }

        //if (var->str.buf[i] == '\n') // +4 \n
        //{
            //k++;
            //if (k > 4)
                //return (-1);
        //}

        // si i % 5 == 0 alors ca doit etre un \n
        i = 0;
        while (var->str.buf[i] != '\n') //+4c et un \n a la fin
        {
            l++;
            if (l > 4/5) // si bien 4c, alors l = 0 et ligne d'apres
                return (-1);
        }

        i++;
    }
    puts("\ntetriminos valid.");
  */  return (0);
}

