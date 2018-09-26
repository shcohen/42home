/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_create_tetris.c                                 :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/20 20:15:54 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/26 21:09:49 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../include/fillit.h"

void    ft_create_tetris(t_vars *vars, char *buf, t_tetris **first) // création du maillon
{
    t_tetris    *maillon;
    t_tetris    *tmp;
    int         i;

    maillon = NULL;
    tmp = NULL;
    i = 0;
    while (buf[i] != '\0')
    {
        if (!(tmp = (t_tetris *)malloc(sizeof(t_tetris))))
            return ;
        tmp->tetris = ft_strsub(buf, i, 20);
        ft_first_check(tmp->tetris);
        ft_check_forme(vars, tmp->tetris);
        if (maillon == NULL)
        {
            maillon = tmp;
            *first = maillon;
        }
        else
        {
            maillon->next = tmp;
            maillon = tmp;
        }
        i += 21;
    }
}