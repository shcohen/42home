/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   draw.c                                             :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/12/13 19:19:40 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/15 18:42:59 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

void    ft_fill_pixel(t_all *all, int color)
{
    if (all->bres.x >= 0 && all->bres.y >= 0 && all->bres.x < all->win.width 
    && all->bres.y < all->win.height)
        all->win.img_str[(int)(all->bres.y * all->win.width + all->bres.x)] = color; 
}

int     ft_colors(t_all *all, int z)
{
    if (all->win.color_choice == 0)
        return(0xFFFFFF);
    else if (all->win.color_choice == 1)
    {
        if (z <= 0)
            return(0x0A5FE8);
        else if (z <= 25)
            return (0x28AB6B);
        else if (z <= 50)
            return (0x8F3810);
        else
            return (0xFFFFFF);
    }
    else
    {
        if (z <= 0)
            return(0xD12287);
        else if (z <= 10)
            return (0x8916FF);
        else if (z <= 30)
            return (0xC800F0);
        else
            return (0x42A7F1);
    }
}

void    ft_array(void)
{
    ft_putstr("\n -------------------------------------------- ");
	ft_putstr("\n|                            ^               |");
	ft_putstr("\n|       you can move with  <   >             |");
	ft_putstr("\n|                            v               |");
	ft_putstr("\n|       you can zoom with '/' & '*'          |");
	ft_putstr("\n|                                            |");
	ft_putstr("\n|  you can inc. & dec. depth with '+' & '-'  |");
	ft_putstr("\n|                                            |");
	ft_putstr("\n|        you can shut down with 'esc'        |");
    ft_putstr("\n --------------------------------------------\n\n");
}