/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   events.c                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/12/13 16:11:08 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/15 16:53:43 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

int     ft_key(int key, t_all *all)
{
    ft_putnbr(key);
    ft_putendl("");
    if (key == 53)
        exit(0);
    else if (key == 69)
    {
        all->win.ex *= 1.2;
        all->win.ey *= 1.2;
        all->win.ez *= 1.2;
    }
    else if (key == 78)
    {
        all->win.ex /= 1.2;
        all->win.ey /= 1.2;
        all->win.ez /= 1.2;
    }
    else if (key == 15)
    {
        all->win.ex = all->win.width / (all->map.width + all->map.height) / 2 
        * 1.732; // isometric projection
	    all->win.ey = all->win.width / (all->map.width + all->map.height) / 2;
	    all->win.ez = all->win.width / (all->map.height + all->map.width) / 5;
	    all->win.ud = 0;
	    all->win.rl = 0;
	    all->win.color_choice = 0;
    }
    else if (key == 67)
        all->win.ez += 0.2;
    else if (key == 75)
        all->win.ez -= 0.2;
    else if (key == 126)
        all->win.ud -= 10;
    else if (key == 125)
        all->win.ud += 10;
    else if (key == 123)
        all->win.rl -= 10;
    else if (key == 124)
        all->win.rl += 10;
    else if (key == 8)
        all->win.color_choice = (all->win.color_choice + 1) % 3;
    ft_bzero(all->win.img_str, all->win.height * all->win.width * sizeof(int));
    ft_display(all);
    mlx_put_image_to_window(all->win.mlx_ptr, all->win.win_ptr, all->win.img_ptr, 0, 0);
    return (0);
}